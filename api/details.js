const sanitizeHtml = require('sanitize-html');
const axios = require('axios');
const { json } = require('express');
const cheerio = require('cheerio');
const mysql = require('mysql2/promise'); 
const url = require('url');


const dbConfig = {
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'ipo',
};

async function fetchUrlsFromDatabase() {
  try {
    const connection = await mysql.createConnection(dbConfig);
    const query = `SELECT link FROM ipos AS all_links; `;
    // const query = `
    //   SELECT link FROM (
    //     SELECT link FROM buyback 
    //     UNION
    //     SELECT link FROM forms 
    //     UNION
    //     SELECT link FROM gmp 
    //     UNION
    //     SELECT link FROM ipos 
    //     UNION
    //     SELECT link FROM recents 
    //     UNION
    //     SELECT link FROM sme 
    //     UNION
    //     SELECT link FROM old_gmp 
    //   ) AS all_links; `;
    
    const [rows] = await connection.query(query);
    const allUrls = rows.map(row => row.link);

    await connection.end();

    return allUrls;
  } catch (error) {
    console.error(`Error fetching URLs from the tables: ${error.message}`);
    return [];
  }
}


async function details(link) {
  try {
    const response = await axios.get(link);
    const html = response.data;
    const $ = cheerio.load(html);

    const targetText = $('[data-id="e2b564b"]').text().trim();
    const detailsText = targetText.split(':')[1].trim();
    return detailsText;   
  } catch (error) {
    return "";
  }
}

// async function PriceBandtable(link) {
//   try {
//     const response = await axios.get(link);
//     const html = response.data;
//     const $ = cheerio.load(html);

//     const tables = $('table');
//     const jsonData = [];

//     tables.each((index, table) => {
//       const tableName = `Table ${index + 1}`;

//       const tableObject = {
//         name: tableName,
//         data: `<table>${$(table).html()}</table>`,
//       };
//       jsonData.push(tableObject);
//     });
//     // await insertPriceBandData({ data: jsonData[0].data });
//     // await insertMarketLotData(jsonData[1].data);
//     // await insertTimeline(jsonData[2].data);
//     // await insertRevenueData(jsonData[3].data);
//     // await insertValuation(jsonData[4].data);
//     // console.log(jsonData[3].data);
//     return jsonData;
//   } catch (error) {
//     return { error: `Error fetching the page: ${error.message}` };
//   }
// }

function findHeading($, element) {
  let heading = $(element).prev('h2').text();
  if (!heading) {
    let prevElement = $(element).prev();
    while (prevElement.length > 0) {
      if (prevElement.is('h2')) {
        heading = prevElement.text();
        break;
      }
      prevElement = prevElement.prev();
    }
  }
  return heading;
}
async function PriceBandtable(link) {
  try {
    const response = await axios.get(link);
    const html = response.data;
    const $ = cheerio.load(html);

    const tables = $('table');
    const jsonData = [];

    tables.each((index, table) => {
      const heading = findHeading($, table); // Get the nearest preceding h2 tag text content
      const tableName = heading ? heading : '';

      const cleanedHtml = cleanHtml($(table).html());
      
      const tableObject = {
        name: tableName,
        data: `<table>${cleanedHtml}</table>`,
      };
      jsonData.push(tableObject);
    });

    return jsonData;
  } catch (error) {
    return { error: `Error fetching the page: ${error.message}` };
  }
}
function cleanHtml(html) {
  // Remove unwanted HTML tags and attributes
  const sanitizedHtml = sanitizeHtml(html, {
    allowedTags: ['table', 'thead', 'tbody', 'tr', 'th', 'td'],
    allowedAttributes: {
      'table': [],
      'thead': [],
      'tbody': [],
      'tr': [],
      'th': ['colspan', 'rowspan'],
      'td': ['colspan', 'rowspan'],
    },
  });

  // Remove inline styles
  const cleanedHtml = sanitizedHtml.replace(/ style=".*?"/g, '');

  return cleanedHtml;
}

async function fetchAllUlAfterHeadings(link) {
  try {
    const response = await axios.get(link);
    const html = response.data;
    const $ = cheerio.load(html);
    const headingElements = $('h2, h3');
    const results = [];

    headingElements.each((index, headingElement) => {
      const headingText = $(headingElement).text().trim();
      const ulElement = $(headingElement).next('ul');

      if (ulElement.length) {
        const ulObject = {
          heading: headingText,
          items: [],
        };

        ulElement.find('li').each((itemIndex, li) => {
          ulObject.items.push($(li).text().trim());
        });

        results.push(ulObject);
      }
    });

    return results;
  } catch (error) {
    return { error: `Error fetching the page: ${error.message}` };
  }
}

async function main() {
  try {
  
    const results = await fetchUrlsFromDatabase();

    const connection = await mysql.createConnection(dbConfig);


    for (const link of results) {
      if (link == null) {
        continue; 
      }
      try {
        const detailText = await details(link);
        const priceBandResult = await PriceBandtable(link);
        const ulAfterHeadingsResult = await fetchAllUlAfterHeadings(link);

        const parsedUrl = url.parse(link);
        const pathParts = parsedUrl.pathname.split('/');
        const slug = pathParts[pathParts.length - 2]; // Get the second last part

        console.log(slug);
        const organizedData = {
          // detailText: detailText,
          ulAfterHeadingsResult :ulAfterHeadingsResult,
          tables : priceBandResult,
          slug: slug,
          link: link     
        };
        console.log(`Data fetched successfully for IPO ${link}:`);
        console.log(organizedData);


        const insertQuery = `INSERT INTO details (slug, tables, link, lists) VALUES (?, ?, ?, ?)`;
        const insertValues = [slug, JSON.stringify(priceBandResult), link, JSON.stringify(ulAfterHeadingsResult)];
        await connection.execute(insertQuery, insertValues);
        console.log(`Data inserted successfully for IPO ${link}`);


      } catch (error) {
        console.error(`An error occurred while fetching data for IPO with ID: ${error.message}`);
      }
    }
  } catch (error) {
    console.error(`An error occurred: ${error.message}`);
  }
}




main();



// CREATE TABLE IF NOT EXISTS details (
//   id INT AUTO_INCREMENT PRIMARY KEY,
//   slug VARCHAR(255),
//   details JSON
// );
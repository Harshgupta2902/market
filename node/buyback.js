const axios = require('axios');
const cheerio = require('cheerio');
const mysql = require('mysql2/promise'); // Make sure to install mysql2

const url = 'https://ipowatch.in/share-buyback-offers/';

// Database configuration
const dbConfig = {
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'ipo',
};

// Function to create table and insert data into the database
async function createTableAndInsertData(rows) {
  const connection = await mysql.createConnection(dbConfig);

  try {
    // Create the table if it doesn't exist
    await connection.execute(`
      CREATE TABLE IF NOT EXISTS buyback (
        id INT AUTO_INCREMENT PRIMARY KEY,
        company_name VARCHAR(255),
        record_date VARCHAR(255),
        open VARCHAR(255),
        link VARCHAR(255) NULL,
        close VARCHAR(255),
        price VARCHAR(255)
      );
    `);

    await connection.query('TRUNCATE TABLE buyback;');

    for (const row of rows) {
      // Access data directly using keys
      const company = row['Column_1'];
      const recordDate = row['Column_2'];
      let open = row['Column_3'];
      let link = row['link']; // Access link directly
      const close = row['Column_4'];
      const price = row['Column_5'];

      // Check if open is undefined or empty, and replace with null
      if (open === undefined || open.trim() === '') {
        open = null;
      }

      if (link === undefined || link.trim() == '') {
        link = null;
      }

      // Insert data into the database
      await connection.execute(
        'INSERT INTO buyback (company_name, record_date, open, link, close, price) VALUES (?, ?, ?, ?, ?, ?)',
        [company, recordDate, open, link, close, price]
      );
    }

    console.log('Table created, and data inserted into the database successfully');
  } catch (error) {
    console.error('Error creating table or inserting data into the database:', error.message);
  } finally {
    await connection.end();
  }
}



axios.get(url)
  .then(response => {
    if (response.status === 200) {
      const html = response.data;
      const $ = cheerio.load(html);

      // Assuming the table you want is the first one on the page
      const table = $('table').first();

      // Extracting table rows
      const rows = [];
      table.find('tbody tr').each((i, row) => {
        const rowData = {};
        $(row).find('td').each((j, cell) => {
          const anchor = $(cell).find('a');
          if (anchor.length > 0) {
            // If an anchor tag is found, extract its text and href
            const anchorText = anchor.text().trim();
            const anchorLink = anchor.attr('href').trim();
            rowData[`Column_${j + 1}`] = anchorText;
            rowData['link'] = anchorLink == null ? null : anchorLink;
          } else {
            rowData[`Column_${j + 1}`] = $(cell).text().trim();
            // rowData['link'] = null;

          }      

        });
        rows.push(rowData);
        console.log(rowData['link']);
      });
      // Create table and insert data into the database
      createTableAndInsertData(rows.slice(1));
    } else {
      console.error('Failed to fetch the page. Status:', response.status);
    }
  })
  .catch(error => {
    console.error('Error fetching the page:', error.message);
  });



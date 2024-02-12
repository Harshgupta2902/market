const axios = require('axios');
const cheerio = require('cheerio');
const mysql = require('mysql');

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'ipo',
});

function createTable() {
  // Truncate the table to clear existing data
  connection.query('TRUNCATE TABLE ipos', (truncateError, truncateResults) => {
    if (truncateError) {
      console.error('Error truncating table:', truncateError.message);
    } else {
      console.log('Table truncated successfully.');
    }

    // Create the table if it doesn't exist
    connection.query(`
      CREATE TABLE IF NOT EXISTS ipos (
        id INT PRIMARY KEY AUTO_INCREMENT,
        companyName VARCHAR(255) NULL,
        date VARCHAR(50) NULL,
        size VARCHAR(50) NULL,
        price VARCHAR(50) NULL,
        status ENUM('Upcoming', 'Forthcoming', 'Closed') NULL,
        link VARCHAR(255) NULL
      )
    `, (error, results) => {
      if (error) {
        console.error('Error creating table:', error.message);
      } else {
        console.log('Table created successfully.');
        fetchAndInsertData();
      }
    });
  });
}

function fetchAndInsertData() {
  const url = 'https://ipowatch.in/upcoming-ipo-calendar-ipo-list/';

  axios
    .get(url)
    .then((response) => {
      const htmlData = response.data;
      const $ = cheerio.load(htmlData);

      const ipos = [];

      $("table tbody tr").each((index, row) => {
        // Skip the first row (header)
        if (index === 0) {
          return;
        }

        const columns = $(row).find("td");
        const companyName = columns.eq(0).text().trim();
        let link = columns.eq(0).find('a').attr('href');
        const date = columns.eq(1).text().trim();
        const size = columns.eq(2).text().trim();
        const price = columns.eq(3).text().trim();
        const status = "Upcoming";
        
        if (link) { 
          if (link.startsWith('/')) {
            link = link.substring(1);
            fullLink = `https://ipowatch.in/${link}`;
          }
          fullLink = link.startsWith('http') ? link : `https://ipowatch.in/${link}`;
        }

        const ipoEntry = [companyName, date, size, price, status, fullLink];
        ipos.push(ipoEntry);
      });
      
      insertData(ipos); // Insert fetched IPO data into the database
    })
    .catch((error) => {
      console.error('Error fetching data:', error.message);
      connection.end();
    });
}
async function insertData(ipos) {
  // Truncate the gmp table to clear existing data
  // await connection.query('TRUNCATE TABLE ipos');

  const insertQuery = 'INSERT INTO ipos (companyName, date, size, price, status, link) VALUES ?';
  connection.query(insertQuery, [ipos], (error, results) => {
    if (error) {
      console.error('Error inserting data into the database:', error.message);
    } else {
      console.log(`${results.affectedRows} rows inserted into the database.`);
    }

    connection.end();
  });
}


connection.connect();
createTable();


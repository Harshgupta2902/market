const axios = require('axios');
const cheerio = require('cheerio');
const mysql = require('mysql2/promise');

const url = 'https://ipowatch.in/ipo-grey-market-premium-latest-ipo-gmp/';

// axios.get(url)
//   .then(async (response) => {
//     if (response.status === 200) {
//       const $ = cheerio.load(response.data);
//       const targetDiv = $('[data-id="107e3c99"]');
//       const stopCondition = ['IPO Name', 'Price', 'IPO GMP', 'Listed'];
//       const table = targetDiv.find('table');
//       const tableData = [];
//       const additionalList = [];
//       let stopScraping = false;

//       table.find('tr').each((index, row) => {
//         const rowData = [];
//         $(row).find('td').each((index, column) => {
//           rowData.push($(column).text().trim());
//         });

//         if (JSON.stringify(rowData) === JSON.stringify(stopCondition)) {
//           stopScraping = true;
//           return;
//         }

//         if (!stopScraping && index !== 0) {
//           tableData.push(rowData);
//         } else if (stopScraping && index !== 0) {
//           additionalList.push(rowData);
//         }
//       });

axios.get(url)
  .then(async (response) => {
    if (response.status === 200) {
      const $ = cheerio.load(response.data);
      const targetDiv = $('[data-id="107e3c99"]');
      const stopCondition = ['IPO Name', 'Price', 'IPO GMP', 'Listed'];
      const table = targetDiv.find('table');
      const tableData = [];
      const additionalList = [];
      let stopScraping = false;

      table.find('tr').each((index, row) => {
        const rowData = [];
        $(row).find('td').each((index, column) => {
          // Check if the cell contains an anchor tag
          const anchor = $(column).find('a');
          if (anchor.length > 0) {
            // If an anchor tag is found, extract its text and href
            const anchorText = anchor.text().trim();
            const anchorLink = anchor.attr('href').trim();
            rowData.push(anchorText);
            rowData.push(anchorLink);
          } else {
            rowData.push($(column).text().trim());
          }
        });

        if (JSON.stringify(rowData) === JSON.stringify(stopCondition)) {
          stopScraping = true;
          return;
        }

        if (!stopScraping && index !== 0) {
          tableData.push(rowData);
        } else if (stopScraping && index !== 0) {
          additionalList.push(rowData);
        }
      });

      console.log(tableData);
      console.log(additionalList);
      // Create a MySQL connection pool
      const pool = mysql.createPool({
        host: 'localhost',
        user: 'root',
        password: '',
        database: 'ipo',
        waitForConnections: true,
        connectionLimit: 10,
        queueLimit: 0
      });

      // Function to create 'gmp' table
      const createGmpTable = async () => {
        const connection = await pool.getConnection();
        try {
          await connection.query(`
            CREATE TABLE IF NOT EXISTS gmp (
              id INT AUTO_INCREMENT PRIMARY KEY,
              ipo_name VARCHAR(255),
              date VARCHAR(255),
              type VARCHAR(255),
              ipo_gmp VARCHAR(255),
              price VARCHAR(255),
              gain VARCHAR(255),
              kostak VARCHAR(255),
              link VARCHAR(255)
            );
          `);
          await connection.query('TRUNCATE TABLE gmp;');

        } finally {
          connection.release();
        }
      };

      // Function to create 'old_gmp' table
      const createOldGmpTable = async () => {
        const connection = await pool.getConnection();
        try {
          await connection.query(`
            CREATE TABLE IF NOT EXISTS old_gmp (
              id INT AUTO_INCREMENT PRIMARY KEY,
              ipo_name VARCHAR(255),
              price VARCHAR(255),
              ipo_gmp VARCHAR(255),
              listed VARCHAR(255),
              link VARCHAR(255)

            );
          `);
          await connection.query('TRUNCATE TABLE old_gmp;');

        } finally {
          connection.release();
        }
      };

      // Function to insert data into 'gmp' table
      const insertGmpData = async () => {
        const connection = await pool.getConnection();
        try {
          for (const data of tableData) {
            const [results] = await connection.query(
              'INSERT INTO gmp (ipo_name,link,  date, type, ipo_gmp, price, gain, kostak) VALUES (?, ?, ?, ?, ?, ?, ?, ?)',
              data
            );
          }
        } finally {
          connection.release();
        }
      };

      // Function to insert data into 'old_gmp' table
      const insertOldGmpData = async () => {
        const connection = await pool.getConnection();
        try {
          for (const data of additionalList.slice(1)) {
            const [results] = await connection.query(
              'INSERT INTO old_gmp (ipo_name,link,  price, ipo_gmp, listed ) VALUES (?, ?, ?, ?, ?)',
              data
            );
          }
        } finally {
          connection.release();
        }
      };
      await createGmpTable();
      await createOldGmpTable();
      await insertGmpData();
      await insertOldGmpData();
      console.log('Data inserted successfully.');
      pool.end();

    }
  })
  .catch((error) => {
    console.error('Error fetching the page:', error);
  });


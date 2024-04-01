// gmp.js

const express = require('express');
const axios = require('axios');
const cheerio = require('cheerio');

const router = express.Router();

router.get('/', async (req, res) => {
  try {
    const url = 'https://ipowatch.in/ipo-grey-market-premium-latest-ipo-gmp/';
    const response = await axios.get(url);
    
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

      res.json({ tableData, additionalList });
    } else {
      throw new Error('Failed to fetch the page');
    }
  } catch (error) {
    console.error('Error fetching data:', error.message);
    res.status(500).json({ error: 'Internal Server Error' });
  }
});

module.exports = router;

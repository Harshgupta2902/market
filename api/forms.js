// forms.js

const express = require('express');
const axios = require('axios');
const cheerio = require('cheerio');

const router = express.Router();

// Define route to fetch data
router.get('/', async (req, res) => {
  try {
    const url = 'https://ipowatch.in/ipo-forms-download-ipo-application-asba-form/';
    const response = await axios.get(url);
    const html = response.data;
    const $ = cheerio.load(html);
    const table = $('table');
    const tableData = [];

    table.find('tr').each((rowIndex, row) => {
      if (rowIndex === 0) {
        return;
      }
      const rowData = [];
      $(row).find('td').each((colIndex, column) => {
        const cellText = $(column).text().trim();
        rowData.push(cellText);
        const anchorLink = $(column).find('a').attr('href');
        const finalCellText = anchorLink ? anchorLink : null;
        rowData.push(finalCellText);
      });
      tableData.push(rowData);
    });

    res.json(tableData);
  } catch (error) {
    console.error('Error fetching data:', error.message);
    res.status(500).json({ error: 'Internal Server Error' });
  }
});

module.exports = router;

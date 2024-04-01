// scrapeSMEIPOData.js

const express = require('express');
const axios = require('axios');
const cheerio = require('cheerio');

const router = express.Router();

router.get('/', async (req, res) => {
  try {
    const response = await axios.get('https://ipowatch.in/upcoming-sme-ipo-calendar-list/');
    const html = response.data;

    const $ = cheerio.load(html);

    const tableData = [];
    $('table tbody tr').each((index, element) => {
      const rowData = {};
      $(element).find('td').each((i, td) => {
        const anchor = $(td).find('a');
        if (anchor.length > 0) {
          const anchorText = anchor.text().trim();
          const anchorLink = anchor.attr('href').trim();
          rowData['link'] = anchorLink;
          rowData[`Column_${i + 1}`] = anchorText;
        } else {
          rowData[`Column_${i + 1}`] = $(td).text().trim();
        }
      });
      tableData.push(rowData);
    });

    res.json(tableData.slice(1));
  } catch (error) {
    console.error('Error:', error.message);
    res.status(500).json({ error: 'Internal Server Error' });
  }
});

module.exports = router;

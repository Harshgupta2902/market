// fetchIPOData.js

const express = require('express');
const axios = require('axios');
const cheerio = require('cheerio');

const router = express.Router();

router.get('/', async (req, res) => {
  try {
    const url = 'https://ipowatch.in';
    const { data } = await axios.get(url);
    const $ = cheerio.load(data);

    const table1Data = extractTableData($, $('#tablepress-1'), 'Upcoming');
    const table2Data = extractTableData($, $('#tablepress-2'), 'SME');

    res.json({ table1Data, table2Data });
  } catch (error) {
    console.error('Error fetching data:', error);
    res.status(500).json({ error: 'Internal Server Error' });
  }
});

function extractTableData($, table, type) {
  const headers = [];
  const rows = [];

  // Extract headers
  table.find('thead tr th').each((i, el) => {
    headers.push($(el).text().trim());
  });

  // Extract rows
  table.find('tbody tr').each((i, row) => {
    const rowData = { Type: type };
    $(row).find('td').each((j, cell) => {
      // Check if the cell contains an anchor tag
      const anchor = $(cell).find('a');
      if (anchor.length > 0) {
        const anchorText = anchor.text().trim();
        const anchorLink = anchor.attr('href').trim();
        rowData[headers[j]] = anchorText;
        rowData['link'] = anchorLink;
      } else {
        rowData[headers[j]] = $(cell).text().trim();
      }
    });
    rows.push(rowData);
  });

  return rows;
}

module.exports = router;

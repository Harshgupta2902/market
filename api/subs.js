// scrapeDataAPI.js

const express = require('express');
const router = express.Router();
const axios = require('axios');
const cheerio = require('cheerio');

router.get('/', async (req, res) => {
  try {
    // Get the URLs from the query parameters
    const url1 = "https://www.chittorgarh.com/report/ipo-subscription-status-live-bidding-data-bse-nse/21/?year=2024";
    const url2 = "https://www.chittorgarh.com/report/sme-ipo-subscription-status-live-bidding-bse-nse/22/";

    const response1 = await axios.get(url1);
    const data1 = await extractData(response1.data);

    const response2 = await axios.get(url2);
    const data2 = await extractData(response2.data);

    const combinedData = { nse: data1, sme: data2 };

    res.json(combinedData);
  } catch (error) {
    console.error('Error:', error.message);
    res.status(500).json({ error: 'Internal Server Error' });
  }
});

// Function to extract data from HTML
async function extractData(html) {
  const $ = cheerio.load(html);
  const tableData = $('#report_data table').map(function () {
    const headers = [];
    const rows = [];
    $(this).find('thead th').each(function () {
      headers.push($(this).text().trim());
    });
    $(this).find('tbody tr').each(function () {
      const row = {};
      $(this).find('td').each(function (index) {
        row[headers[index]] = $(this).text().trim();
      });
      rows.push(row);
    });
    return rows;
  }).get();
  return tableData;
}

module.exports = router;

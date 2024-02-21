const axios = require('axios');
const cheerio = require('cheerio');
const mysql = require('mysql2/promise');

const insertDataIntoDatabase = async (url, tableName) => {
  try {
    const response = await axios.get(url);
    if (response.status === 200) {
      const html = response.data;
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
      console.log(tableData);
    }
  } catch (error) {
    console.error(`Error fetching data from ${url}: ${error.message}`);
  }
};
const firstUrl = 'https://www.chittorgarh.com/report/ipo-subscription-status-live-bidding-data-bse-nse/21/?year=2024';
const firstTableName = 'ipo_subscription_data';
insertDataIntoDatabase(firstUrl, firstTableName);


const secondUrl = 'https://www.chittorgarh.com/report/sme-ipo-subscription-status-live-bidding-bse-nse/22/';
const secondTableName = 'sme_subscription_data';
insertDataIntoDatabase(secondUrl, secondTableName);

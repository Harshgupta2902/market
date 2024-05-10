const express = require('express');
const axios = require('axios');
const cheerio = require('cheerio');

const router = express.Router();


router.get('/', async (req, res) => {
  try {
    const url = 'https://ipowatch.in/upcoming-ipo-calendar-ipo-list/';
    const response = await axios.get(url);
    const html = response.data;
    const $ = cheerio.load(html);

    const ipos = [];

    $("table tbody tr").each((index, row) => {
      if (index === 0) {
        return;
      }

      const columns = $(row).find("td");
      const companyName = columns.eq(0).text().trim();
      const link = columns.eq(0).find('a').attr('href');
      const date = columns.eq(1).text().trim();
      const size = columns.eq(2).text().trim();
      const price = columns.eq(3).text().trim();
      const status = "Upcoming";
      
      let fullLink = link;

      if (fullLink && !fullLink.startsWith('http')) {
        fullLink = `https://ipowatch.in/${fullLink}`;
      }

      const ipoEntry = {
        companyName,
        date,
        size,
        price,
        status,
        link: fullLink
      };

      if (link) { // Only push IPO entry if link exists
        ipos.push(ipoEntry);
      }
    });

    res.json(ipos);
  } catch (error) {
    console.error('Error fetching IPO data:', error.message);
    res.status(500).json({ error: 'Internal Server Error' });
  }
});


module.exports = router;

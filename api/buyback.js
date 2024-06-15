// buyback.js

const express = require("express");
const axios = require("axios");
const cheerio = require("cheerio");

const router = express.Router();

router.get("/", async (req, res) => {
  try {
    const url = "https://ipowatch.in/share-buyback-offers/";
    const response = await axios.get(url);
    const html = response.data;
    const $ = cheerio.load(html);

    const buybackOffers = [];

    const table = $("table").first();
    table.find("tbody tr").each((i, row) => {
      const rowData = {};
      $(row)
        .find("td")
        .each((j, cell) => {
          const anchor = $(cell).find("a");
          if (anchor.length > 0) {
            const anchorText = anchor.text().trim();
            const anchorLink = anchor.attr("href").trim();
            rowData[`Column_${j + 1}`] = anchorText;
            rowData["link"] = anchorLink == null ? null : anchorLink;
          } else {
            rowData[`Column_${j + 1}`] = $(cell).text().trim();
          }
        });
      buybackOffers.push(rowData);
    });

    res.json(buybackOffers.slice(1)); // Exclude header row
  } catch (error) {
    console.error("Error fetching buyback offers data:", error.message);
    res.status(500).json({ error: "Internal Server Error" });
  }
});

module.exports = router;

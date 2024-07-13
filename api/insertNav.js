const express = require("express");
require("firebase/firestore");
const admin = require("firebase-admin");
const axios = require("axios");
const serviceAccount = require("./serviceAccountKey.json"); // Update this path

const router = express.Router();
const db = admin.firestore();
router.use(express.json());

router.get("/", async (req, res) => {
  try {
    const isins = await fetchISINsFromMySQL();
    let successCount = 0;

    for (let isin of isins) {
      try {
        await fetchAndInsertData(isin.isin);
        successCount++;

        console.log(`${successCount} Successfully processed ISIN ${isin}`);
      } catch (error) {
        console.error(`Failed to process ISIN ${isin}`, error);
      }
    }
    console.log(
      `All ISIN data fetched and inserted or updated successfully. Total ISINs processed: ${successCount}`
    );
    res.status(200).send("Data processing complete");
  } catch (error) {
    console.error("Main process error:", error);
    res.status(500).send("Internal server error");
  }
});

const fetchISINsFromMySQL = async () => {
  try {
    const liveUrl = "https://ipo.onlineinfotech.net/Api/getisin";
    const response = await axios.get(liveUrl);
    console.log(`All ISINs fetched: ${response.data.length}`);
    return response.data;
  } catch (error) {
    console.error("Error fetching ISINs", error);
    throw error;
  }
};

const insertData = async (isin, navData) => {
  try {
    const docRef = db.collection("ISINs").doc(isin);
    const doc = await docRef.get();
    if (doc.exists) {
      await docRef.update({ isin: navData });
      console.log(`Existing data for ISIN ${isin} updated`);
    } else {
      await docRef.set({ isin: navData });
      console.log(`Data for ISIN ${isin} inserted`);
    }
  } catch (error) {
    console.error(`Error inserting or updating data for ISIN ${isin}:`, error);
    throw error;
  }
};

const fetchAndInsertData = async (isin) => {
  try {
    const response = await axios.get(
      `https://www.moneycontrol.com/mc/widget/mfnavonetimeinvestment/get_chart_value?isin=${isin}&dur=ALL`
    );
    const apiData = response.data.g1;

    if (apiData && apiData.error_code && apiData.error_msg) {
      console.error(`API Error for ISIN ${isin}: ${apiData[0].error_msg}`);
      return;
    } else {
      await insertData(isin, apiData);
    }

    console.log(`API data fetched and inserted for ISIN ${isin}`);
  } catch (error) {
    console.error(`Error fetching or inserting data for ISIN ${isin}:`, error);
    throw error;
  }
};

module.exports = router;

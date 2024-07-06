const firebase = require("firebase/app");
require("firebase/firestore");
const admin = require("firebase-admin");
const axios = require("axios");
const mysql = require("mysql");
const serviceAccount = require("./serviceAccountKey.json"); // Update this path

// Initialize Firebase Admin SDK
admin.initializeApp({
  credential: admin.credential.cert(serviceAccount),
});

const db = admin.firestore();

// MySQL Database Connection Configuration
const mysqlConfig = {
  host: "localhost",
  user: "root",
  password: "",
  database: "ipotech",
};

const connection = mysql.createConnection(mysqlConfig);

// Function to fetch ISINs from MySQL
const fetchISINsFromMySQL = () => {
  return new Promise((resolve, reject) => {
    connection.connect((err) => {
      if (err) {
        console.error("Error connecting to MySQL:", err);
        reject(err);
      } else {
        console.log("Connected to MySQL database.");
        const query = "SELECT isin FROM mutual_funds";
        connection.query(query, (err, results) => {
          if (err) {
            console.error("Error fetching ISINs:", err);
            reject(err);
          } else {
            resolve(results.map((row) => row.isin));
          }
          connection.end();
        });
      }
    });
  });
};

// Function to insert NAV data into Firestore
const insertData = async (isin, navData) => {
  try {
    const docRef = db.collection("ISINs").doc(isin);
    const doc = await docRef.get();
    if (doc.exists) {
      await docRef.delete();
      console.log(`Existing data for ISIN ${isin} cleared`);
    }
    await docRef.set({ isin: navData });

    console.log(`Data for ISIN ${isin} inserted or updated successfully`);
  } catch (error) {
    console.error(`Error inserting or updating data for ISIN ${isin}:`, error);
    throw error; // Re-throw the error to propagate it
  }
};

// Function to fetch and insert data for a specific ISIN
const fetchAndInsertData = async (isin) => {
  try {
    const response = await axios.get(
      `https://www.moneycontrol.com/mc/widget/mfnavonetimeinvestment/get_chart_value?isin=${isin}&dur=ALL`
    );
    const apiData = response.data.g1;

    await insertData(isin, apiData);
    console.log(`API data fetched and inserted for ISIN ${isin}`);
  } catch (error) {
    console.error(`Error fetching or inserting data for ISIN ${isin}:`, error);
    throw error; // Re-throw the error to propagate it
  }
};

// Main function to fetch ISINs from MySQL and fetch/insert data for each ISIN
const main = async () => {
  try {
    const isins = await fetchISINsFromMySQL();
    let successCount = 0;

    for (let isin of isins) {
      try {
        await fetchAndInsertData(isin);
        successCount++;

        console.log(`${successCount} Successfully processed ISIN ${isin}`);
      } catch (error) {
        console.error(`Failed to process ISIN ${isin}`, error);
      }
    }
    console.log(
      `All ISIN data fetched and inserted or updated successfully. Total ISINs inserted: ${successCount}`
    );
  } catch (error) {
    console.error("Main process error:", error);
  }
};

// Execute main function
main();

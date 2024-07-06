const firebase = require("firebase/app");
require("firebase/firestore");
const admin = require("firebase-admin");
const axios = require("axios");
const serviceAccount = require("./serviceAccountKey.json"); // Update this path

admin.initializeApp({
  credential: admin.credential.cert(serviceAccount),
});

const db = admin.firestore();

const insertData = async (isin, navData) => {
  const collectionRef = db.collection("ISINs").doc(isin).collection("NAVs");

  const batch = db.batch();
  navData.forEach((item) => {
    const docRef = collectionRef.doc(item.navDate);
    batch.set(docRef, item);
  });

  await batch.commit();
  console.log("Data inserted successfully");
};

const fetchAndInsertData = async (isin) => {
  try {
    const response = await axios.get(
      `https://www.moneycontrol.com/mc/widget/mfnavonetimeinvestment/get_chart_value?isin=${isin}&dur=ALL`
    );
    const apiData = response.data.g1;
    console.log(response.data.g1);

    await insertData(isin, apiData);
    console.log("API data fetched and inserted successfully");
  } catch (error) {
    console.error("Error fetching data from API:", error);
  }
};

(async () => {
  //   await insertData('INF579M01AY9', data);
  //   await fetchAndInsertData("INF579M01AY9");
  await fetchAndInsertData("INF109K010B4");
  //   await fetchAndInsertData("INF179KB1HX3");
})();

// const firebase = require("firebase/app");
// require("firebase/firestore");
// const admin = require("firebase-admin");
// const axios = require("axios");
// const mysql = require("mysql");
// const serviceAccount = require("./serviceAccountKey.json"); // Update this path

// // Initialize Firebase Admin SDK
// admin.initializeApp({
//   credential: admin.credential.cert(serviceAccount),
// });

// const db = admin.firestore();

// // MySQL Database Connection Configuration
// const mysqlConfig = {
//   host: "localhost",
//   user: "root",
//   password: "",
//   database: "ipotech",
// };

// const connection = mysql.createConnection(mysqlConfig);

// // Function to fetch ISINs from MySQL
// const fetchISINsFromMySQL = () => {
//   return new Promise((resolve, reject) => {
//     connection.connect((err) => {
//       if (err) {
//         console.error("Error connecting to MySQL:", err);
//         reject(err);
//       } else {
//         console.log("Connected to MySQL database.");
//         const query = "SELECT isin FROM mutual_funds";
//         connection.query(query, (err, results) => {
//           if (err) {
//             console.error("Error fetching ISINs:", err);
//             reject(err);
//           } else {
//             resolve(results.map((row) => row.isin));
//           }
//           connection.end();
//         });
//       }
//     });
//   });
// };

// // Function to insert NAV data into Firestore
// const insertData = async (isin, navData) => {
//   const collectionRef = db.collection("ISINs").doc(isin).collection("NAVs");

//   // Fetch existing documents to check if they exist
//   const existingDocs = await collectionRef.listDocuments();
//   const existingDocIds = existingDocs.map((doc) => doc.id);

//   const batch = db.batch();
//   navData.forEach((item) => {
//     const docRef = collectionRef.doc(item.navDate);
//     if (existingDocIds.includes(item.navDate)) {
//       // Document exists, update it
//       batch.set(docRef, item, { merge: true });
//       console.log(`Updated existing document for ${isin} - ${item.navDate}`);
//     } else {
//       // Document doesn't exist, create it
//       batch.set(docRef, item);
//       console.log(`Inserted new document for ${isin} - ${item.navDate}`);
//     }
//   });

//   try {
//     await batch.commit();
//     console.log(`Data for ISIN ${isin} inserted or updated successfully`);
//   } catch (error) {
//     console.error(`Error inserting or updating data for ISIN ${isin}:`, error);
//     throw error; // Re-throw the error to propagate it
//   }
// };

// // Function to fetch and insert data for a specific ISIN
// const fetchAndInsertData = async (isin) => {
//   try {
//     const response = await axios.get(
//       `https://www.moneycontrol.com/mc/widget/mfnavonetimeinvestment/get_chart_value?isin=${isin}&dur=ALL`
//     );
//     const apiData = response.data.g1;

//     await insertData(isin, apiData);
//     console.log(`API data fetched and inserted for ISIN ${isin}`);
//   } catch (error) {
//     console.error(`Error fetching or inserting data for ISIN ${isin}:`, error);
//     throw error; // Re-throw the error to propagate it
//   }
// };

// // Main function to fetch ISINs from MySQL and fetch/insert data for each ISIN
// const main = async () => {
//   try {
//     const isins = await fetchISINsFromMySQL();
//     for (let isin of isins) {
//       try {
//         await fetchAndInsertData(isin);
//         console.log(`Successfully processed ISIN ${isin}`);
//       } catch (error) {
//         console.error(`Failed to process ISIN ${isin}`, error);
//       }
//     }
//     console.log("All ISIN data fetched and inserted or updated successfully");
//   } catch (error) {
//     console.error("Main process error:", error);
//   }
// };

// // Execute main function
// main();

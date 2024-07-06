const express = require("express");
const admin = require("firebase-admin");
const serviceAccount = require("./serviceAccountKey.json"); // Update this path

admin.initializeApp({
  credential: admin.credential.cert(serviceAccount),
});

const db = admin.firestore();
const router = express.Router();

// Middleware to parse JSON bodies
router.get(express.json());

// Route to get NAV data
router.get("/:isin", async (req, res) => {
  const { isin } = req.params;

  try {
    const navData = await getNavData(isin);
    res.json(navData);
  } catch (error) {
    console.error("Error retrieving NAV data:", error);
    res.status(500).json({ error: "Failed to retrieve NAV data" });
  }
});

const getNavData = async (isin) => {
  const navData = [];
  try {
    const snapshot = await db
      .collection("ISINs")
      .doc(isin)
      .collection("NAVs")
      .get();

    snapshot.forEach((doc) => {
      navData.push({
        navDate: doc.id,
        navValue: doc.data().navValue,
      });
    });

    console.log("Nav Data fetched successfully for ISIN:", isin);
    return navData;
  } catch (error) {
    console.error("Error fetching Nav Data:", error);
    throw error;
  }
};


module.exports = router;

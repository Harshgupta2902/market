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
    const docRef = db.collection("ISINs").doc(isin);
    const doc = await docRef.get();

    if (doc.exists) {
      console.log("Document data:", doc.data());
      return doc.data();
    } else {
      console.log("No such document!");
    }
  } catch (error) {
    console.error("Error fetching Nav Data:", error);
    throw error;
  }
};

module.exports = router;

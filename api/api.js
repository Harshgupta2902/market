// app.js

const express = require("express");
const ipoService = require("./ipo");
const buybackService = require("./buyback");
const formsService = require("./forms");
const gmpService = require("./gmp");
const mainService = require("./main");
const smeService = require("./sme");
const subsService = require("./subs");
const details = require("./details");
const getNav = require("./getNav");
const insertNav = require("./insertNav");

const app = express();

// Define API endpoints
app.use("/api/buyback", buybackService);
app.use("/api/forms", formsService);
app.use("/api/gmp", gmpService);
app.use("/api/ipo", ipoService);
app.use("/api/main", mainService);
app.use("/api/sme", smeService);
app.use("/api/subs", subsService);
app.use("/api/getDetails", details);
app.use("/api/getNav", getNav);
app.use("/api/insertNav", insertNav);

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}`);
});




// app.js
const bodyParser = require('body-parser'); // Import body-parser

const express = require('express');
const ipoService = require('./ipo');
const buybackService = require('./buyback');
const formsService = require('./forms'); 
const gmpService = require('./gmp'); 
const mainService = require('./main'); 
const smeService = require('./sme'); 
const subsService = require('./subs'); 
const details = require('./details'); 


const app = express();

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

// Define API endpoints
app.use('/api/buyback', buybackService);
app.use('/api/forms', formsService); 
app.use('/api/gmp', gmpService); 
app.use('/api/ipo', ipoService);
app.use('/api/main', mainService); 
app.use('/api/sme', smeService); 
app.use('/api/subs', subsService); 
app.use('/api/getDetails', details); 

const PORT = process.env.PORT || 3000;

app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}`);
});

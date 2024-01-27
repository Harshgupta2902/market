const cron = require('node-cron');
const ipo = require('./ipo');
const forms = require('./forms');
const subs = require('./subs');
const main = require('./main');
const buyback = require('./buyback');
const faq = require('./faq');
const sme = require('./sme');
const gmp = require('./gmp');
// const details = require('./details');

// Schedule scripts to run at specific intervals
cron.schedule('0 0 * * *', () => {
  console.log('Running IPO script');
  ipo(); // Assuming each script is a function
});

cron.schedule('0 1 * * *', () => {
  console.log('Running Forms script');
  forms();
});

cron.schedule('0 2 * * *', () => {
  console.log('Running Subs script');
  subs();
});

cron.schedule('0 3 * * *', () => {
  console.log('Running Main script');
  main();
});

cron.schedule('0 4 * * *', () => {
  console.log('Running Buyback script');
  buyback();
});

cron.schedule('0 5 * * *', () => {
  console.log('Running FAQ script');
  faq();
});

cron.schedule('0 6 * * *', () => {
  console.log('Running SME script');
  sme();
});

cron.schedule('0 7 * * *', () => {
  console.log('Running GMP script');
  gmp();
});

// cron.schedule('0 8 * * *', () => {
//   console.log('Running Details script');
//   details();
// });

console.log('Scheduler is running');

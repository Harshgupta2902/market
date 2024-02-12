const ipo = require('./ipo');
const forms = require('./forms');
const subs = require('./subs');
const main = require('./main');
const buyback = require('./buyback');
const faq = require('./faq');
const sme = require('./sme');
const gmp = require('./gmp');

async function insertData() {
    try {
        // Create a single database connection pool
        const pool = await mysql.createPool({
            host: 'localhost',
            user: 'root',
            password: '',
            database: 'ipo',
            waitForConnections: true,
            connectionLimit: 10,
            queueLimit: 0
        });

        // Execute scripts sequentially
        await main.insertData(pool);
        await ipo.insertData(pool);
        await forms.insertData(pool);
        await subs.insertData(pool);
        await buyback.insertData(pool);
        await faq.insertData(pool);
        await sme.insertData(pool);
        await gmp.insertData(pool);
        // await details.insertData(pool);

        // Close the connection pool
        await pool.end();

        console.log("All data inserted successfully");
    } catch (error) {
        console.error("Error inserting data:", error);
    }
}

insertData();

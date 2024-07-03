const axios = require('axios');
const fs = require('fs');
const mysql = require('mysql2/promise'); // Using mysql2 for async/await support

// MySQL database configuration
const dbConfig = {
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'ipotech'
};


// // Function to fetch mutual fund IDs from database
// async function getMfIds() {
//     try {
//         console.log('Connecting to database...');
//         const connection = await mysql.createConnection(dbConfig);
//         console.log('Connected to database.');

//         console.log('Fetching mutual fund IDs...');
//         const [rows] = await connection.execute('SELECT mfId FROM mutual_funds');
//         connection.end(); // Close connection

//         console.log('Processing mutual fund IDs...');
//         const outputData = await Promise.all(rows.map(async (row) => {
//             const mfId = row.mfId;
//             const summaryData = await getMfSummary(mfId);
//             return summaryData;
//         }));

//         // Save outputData to a JSON file
//         fs.writeFileSync('mutual_funds_data.json', JSON.stringify(outputData, null, 2));
//         console.log('Data saved to mutual_funds_data.json');
//     } catch (error) {
//         console.error('Error:', error.message);
//     }
// }

// // Function to fetch mutual fund summary from API
// async function getMfSummary(mfId) {
//     try {
//         console.log(`Fetching summary for mfId ${mfId}...`);
//         const response = await axios.get(`https://api.tickertape.in/mutualfunds/${mfId}/summary`);
        
//         if (response.data.data && response.data.data.meta && response.data.data.meta.isin) {
//             const summaryData = {
//                 mfId: mfId,
//                 isin: response.data.data.meta.isin
//             };
//             console.log(`Received ISIN ${summaryData.isin} for mfId ${mfId}`);
//             return summaryData;
//         } else {
//             console.log(`No ISIN received for mfId ${mfId}`);
//             return {
//                 mfId: mfId,
//                 error: 'No ISIN found'
//             };
//         }
//     } catch (error) {
//         console.error(`Error fetching summary for mfId ${mfId}:`, error.message);
//         return {
//             mfId: mfId,
//             error: error.message
//         };
//     }
// }

// // Call the main function to start the process
// getMfIds();

const pool = mysql.createPool({
    connectionLimit: 10, // Adjust as per your application needs
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'ipotech'
});


async function updateDatabaseFromJsonFile() {
    try {
        console.log('Reading JSON file...');
        const jsonData = fs.readFileSync('mutual_funds_data.json', 'utf8');
        const data = JSON.parse(jsonData);

        console.log('Connecting to database...');
        const connection = await pool.getConnection();

        console.log('Updating database with ISIN data...');
        await Promise.all(data.map(async (item) => {
            const { mfId, isin } = item;
            try {
                console.log(`Updating ISIN ${isin} for mfId ${mfId}...`);
                await connection.execute('UPDATE mutual_funds SET isin = ? WHERE mfId = ?', [isin, mfId]);
                console.log(`Updated ISIN ${isin} for mfId ${mfId}`);
            } catch (error) {
                console.error(`Error updating ISIN for mfId ${mfId}:`, error.message);
            }
        }));

        connection.release(); // Release the connection back to the pool
        console.log('Database update complete.');
    } catch (error) {
        console.error('Error:', error.message);
    }
}

// Retry mechanism for handling ECONNRESET and transient errors
async function retryOperation(fn, retries = 3, delay = 5000) {
    try {
        await fn();
    } catch (error) {
        console.error('Error:', error.message);
        if (retries > 0 && error.code === 'ECONNRESET') {
            console.log(`Retrying after ${delay / 1000} seconds...`);
            await new Promise(resolve => setTimeout(resolve, delay));
            await retryOperation(fn, retries - 1, delay);
        } else {
            console.error('Retry limit exceeded or non-retryable error.');
        }
    }
}

// Main function to initiate the update process with retries
async function main() {
    await retryOperation(updateDatabaseFromJsonFile);
}

// Start the main process
main();

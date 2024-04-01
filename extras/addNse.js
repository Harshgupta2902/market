const fs = require('fs');
const csv = require('csv-parser');
const mysql = require('mysql');

// MySQL database connection configuration
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'ipo'
});

// Connect to the MySQL database
connection.connect((err) => {
    if (err) {
        console.error('Error connecting to MySQL database:', err.message);
        return;
    }
    console.log('Connected to MySQL database');
});

// Path to your CSV file
const csvFilePath = 'nse.csv';

// Create a table if it doesn't exist
const createTableQuery = `
    CREATE TABLE IF NOT EXISTS symbols (
        id INT AUTO_INCREMENT PRIMARY KEY,
        symbol VARCHAR(20) UNIQUE
    )
`;

connection.query(createTableQuery, (err) => {
    if (err) {
        console.error('Error creating table:', err.message);
        connection.end();
        return;
    }
    console.log('Table created or already exists');
});

// Read the CSV file and insert symbols into the database
fs.createReadStream(csvFilePath)
    .pipe(csv())
    .on('data', (row) => {
        const symbol = row['Symbol'];
        const insertQuery = `
            INSERT IGNORE INTO symbols (symbol)
            VALUES (?)
        `;
        connection.query(insertQuery, [symbol], (err) => {
            if (err) {
                console.error('Error inserting symbol:', err.message);
            }
        });
    })
    .on('end', () => {
        console.log('Symbols inserted into the table');
        connection.end();
    });

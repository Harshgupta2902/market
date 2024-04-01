import pandas as pd
import sqlite3

# Read the CSV file into a pandas DataFrame
df = pd.read_csv('nse.csv')

# Extract the symbols from the DataFrame
symbols = df['Symbol'].tolist()

# Connect to your SQLite database
conn = sqlite3.connect('ipo')
cur = conn.cursor()

# Create a table if it doesn't exist
cur.execute('''
    CREATE TABLE IF NOT EXISTS symbols (
        id INTEGER PRIMARY KEY,
        symbol TEXT UNIQUE
    )
''')

# Insert the symbols into the table
for symbol in symbols:
    cur.execute('''
        INSERT OR IGNORE INTO symbols (symbol)
        VALUES (?)
    ''', (symbol,))

# Commit the changes and close the connection
conn.commit()
conn.close()

print('Symbols inserted into the table.')

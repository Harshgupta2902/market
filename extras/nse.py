import requests
import csv

# Function to check if a URL is working
def check_url(url):
    try:
        response = requests.get(url)
        response.raise_for_status()  # Raises an HTTPError for bad responses
        return True
    except requests.exceptions.RequestException as e:
        print(f"Error: {e}")
        return False

# Read the CSV file
with open('nse.csv', 'r') as csvfile:
    # Assuming your CSV file has a header row
    csv_reader = csv.DictReader(csvfile)
    
    # Loop through each row in the CSV
    for row in csv_reader:
        # Construct the URL using the 'Symbol' column
        symbol = row['Symbol']
        url = f'https://ticker.finology.in/company/{symbol}'
        
        # Check if the URL is working
        if check_url(url):
            print(f'The URL for {symbol} is working.')
        else:
            print(f'There was an error opening the URL for {symbol}.')

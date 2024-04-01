const express = require('express');
const axios = require('axios');
const router = express.Router();

router.get('/', async (req, res) => {
  try {
    const response = await axios.get('https://hdfcsky.com/api/v1/data/mf/schemes/explore?limit=5000', {
      headers: {
        'X-Device-Id': '123456789', // Example device ID
        'X-Device-Type': 'web', // Example device type
        'User-Agent': req.headers['user-agent'] || '' // Forward user agent from client
        // Add any other headers if needed
      }
    });

    res.json(response.data); // Send the API response as JSON
  } catch (error) {
    console.error('Error fetching data:', error);
    res.status(500).json({ error: 'An error occurred while fetching data' });
  }
});

module.exports = router;

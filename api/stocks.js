
const express = require('express');
const axios = require('axios');
const router = express.Router();

router.get('/', async (req, res) => {
  const { key } = req.query;
  if (!key) {
      return res.status(400).json({ error: 'Key parameter is required' });
  }

  const apiUrl = `https://hdfcsky.com/api/v1/search?key=${key}`;
  // const apiUrl = `https://hdfcsky.com/api/v1/search?key=${key}&segment=Equity`;

  try {
    const response = await axios.get(apiUrl,{
        headers: {
            'X-Device-Id': '123456789', // Example device ID
            'X-Device-Type': 'web', // Example device type
            'User-Agent': req.headers['user-agent'] || '' // Forward user agent from client
            // Add any other headers if needed
          }
    });
    res.json(response.data);
  } catch (error) {
    res.status(error.response.status || 500).json({ error: error.message });
  }
});

module.exports = router;

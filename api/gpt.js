const axios = require('axios');

async function sendRequestToChatGPT() {
    const apiKey = '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';

    const userMessage = {
        role: 'user',
        content: "Write a blog on The Benefits of Incorporating Meditation into Your Daily Routine"
    };

    let generatedContent = '';

    try {
        let remainingWords = 1200; // Target number of words
        while (remainingWords > 0) {
            const response = await axios.post('https://api.openai.com/v1/chat/completions', {
                model: 'gpt-3.5-turbo',
                messages: [userMessage],
                temperature: 0.7,
                max_tokens: Math.min(50, remainingWords), // Max tokens per request or remaining words
                stop: '\n'
            }, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${apiKey}`
                }
            });

            const generatedText = response.data.choices[0].message.content.trim();
            generatedContent += generatedText + ' ';
            remainingWords -= generatedText.split(' ').length;
        }

        console.log(generatedContent);
        return generatedContent.trim();

    } catch (error) {
        console.error('Error sending request to ChatGPT:', error);
        throw error; // Handle or rethrow as needed in your application
    }
}

sendRequestToChatGPT();

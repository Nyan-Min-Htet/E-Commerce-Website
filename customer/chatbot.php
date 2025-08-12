<?php
header("Content-Type: application/json");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include Parsedown for Markdown to HTML conversion
require_once __DIR__ . '/libs/Parsedown.php';

// Your OpenRouter API key (replace with your actual key)
$apiKey = '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';

// Get the message from frontend POST
$data = json_decode(file_get_contents('php://input'), true);
$userMessage = trim($data['message'] ?? '');

if (!$userMessage) {
    echo json_encode(["reply" => "Please enter a question or message."]);
    exit;
}

// System prompt that sets the chatbot context
$systemPrompt = <<<EOD
You are a helpful assistant for Yan Yan Flower House, a floral shop.  
The shop sells these flowers and plants:
- FLOWER BULBS  
- CLEMATIS & VINES  
- ROSES  
- FRUITS TREES & BUSHES  
- TREES  
Here my Price List:
- FLOWER BULBS: 10500 MMK
- CLEMATIS & VINES: 3500 MMK at least
- ROSES: 101500 MMK at least
- FRUITS TREES & BUSHES: 3500 MMK at least
- TREES: 13500 MMK at least
Delivery to downtown Yangon is 3,000 MMK and usually arrives within 2 hours after your order is confirmed.
For orders placed before 4 PM, we offer same-day delivery within Yangon.
We accept KBZPay, WavePay, and cash on delivery for all orders.
Answer questions about products, prices, delivery, and contact information politely and clearly.  
Use Markdown formatting for lists, tables, and emphasis where helpful.
EOD;

// Prepare payload for OpenRouter API
$payload = [
    "model" => "deepseek/deepseek-r1:free",
    "messages" => [
        ["role" => "system", "content" => $systemPrompt],
        ["role" => "user", "content" => $userMessage]
    ]
];

// Call OpenRouter API
$ch = curl_init("https://openrouter.ai/api/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode(["reply" => 'cURL error: ' . curl_error($ch)]);
    exit;
}

curl_close($ch);

// Decode response
$result = json_decode($response, true);
$replyMarkdown = $result['choices'][0]['message']['content'] ?? "Sorry, I couldn't generate a response.";

// Convert Markdown to HTML
$Parsedown = new Parsedown();
$Parsedown->setSafeMode(false);
$replyHtml = $Parsedown->text($replyMarkdown);

echo json_encode(["reply" => $replyHtml]);
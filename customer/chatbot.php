<?php
header("Content-Type: application/json");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include Parsedown for Markdown to HTML conversion
require_once __DIR__ . '/libs/Parsedown.php';

// Your OpenRouter API key - store this in a config file or environment variable
$apiKey = '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';

// Get the message from frontend POST
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(["error" => true, "message" => "Invalid JSON input"]);
    exit;
}

$userMessage = trim($data['message'] ?? '');

if (empty($userMessage)) {
    echo json_encode(["error" => true, "message" => "Please enter a question or message."]);
    exit;
}

// System prompt
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
    "model" => "openai/gpt-3.5-turbo", // Try a different model if this fails
    "messages" => [
        ["role" => "system", "content" => $systemPrompt],
        ["role" => "user", "content" => $userMessage]
    ],
    "max_tokens" => 500
];

// Call OpenRouter API
$ch = curl_init("https://openrouter.ai/api/v1/chat/completions");
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey,
        'HTTP-Referer: http://localhost', // Add this header
        'X-Title: Yan Yan Flower House'   // Add this header
    ],
    CURLOPT_POSTFIELDS => json_encode($payload),
    CURLOPT_TIMEOUT => 30,
    CURLOPT_SSL_VERIFYPEER => false, // For testing only
    CURLOPT_SSL_VERIFYHOST => 0      // For testing only
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    $error_msg = curl_error($ch);
    echo json_encode(["error" => true, "message" => "API connection failed: " . $error_msg]);
    curl_close($ch);
    exit;
}

$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Check HTTP status
if ($httpCode !== 200) {
    error_log("OpenRouter API returned HTTP $httpCode: " . $response);
    echo json_encode(["error" => true, "message" => "API returned error code $httpCode"]);
    exit;
}

// Decode response
$result = json_decode($response, true);

if (!$result || !isset($result['choices'][0]['message']['content'])) {
    error_log("Invalid API response structure: " . $response);
    echo json_encode(["error" => true, "message" => "Invalid response from AI service"]);
    exit;
}

$replyMarkdown = $result['choices'][0]['message']['content'];

// Convert Markdown to HTML
$Parsedown = new Parsedown();
$Parsedown->setSafeMode(true); // Enable safe mode for security
$replyHtml = $Parsedown->text($replyMarkdown);

// Return only one JSON response
echo json_encode([
    "success" => true,
    "reply" => $replyHtml
]);
exit;
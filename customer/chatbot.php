<?php
header("Content-Type: application/json");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include Parsedown for Markdown to HTML conversion
require_once __DIR__ . '/libs/Parsedown.php';

// Your OpenRouter API key
$apiKey = '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';

// Optional meta info for OpenRouter rankings
$siteUrl = 'http://localhost:3000/customer/index.php';
$siteName = 'Yan Yan Floral House';

// Get the message from the frontend
$data = json_decode(file_get_contents('php://input'), true);
$userMessage = $data['message'] ?? '';

if (!$userMessage) {
    echo json_encode(["reply" => "No message received."]);
    exit;
}

// Build the payload
$payload = [
    "model" => "deepseek/deepseek-r1:free",
    "messages" => [
        ["role" => "system", "content" => "You are a friendly flower shop assistant. Answer questions about products, prices, delivery, and contact information. You can use Markdown formatting for tables, bold text, and bullet lists."],
        ["role" => "user", "content" => $userMessage]
    ]
];

// Call OpenRouter API
$ch = curl_init("https://openrouter.ai/api/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey,
    'HTTP-Referer: ' . $siteUrl,
    'X-Title: ' . $siteName
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode(["reply" => 'cURL error: ' . curl_error($ch)]);
    exit;
}

curl_close($ch);

// Save response for debugging
file_put_contents("debug_response.json", $response);

$result = json_decode($response, true);
$replyMarkdown = $result['choices'][0]['message']['content'] ?? "Sorry, I couldn't generate a response.";

// Convert Markdown to HTML
$Parsedown = new Parsedown();
$Parsedown->setSafeMode(false); // Allow HTML
$replyHtml = $Parsedown->text($replyMarkdown);

echo json_encode(["reply" => $replyHtml]);
?>
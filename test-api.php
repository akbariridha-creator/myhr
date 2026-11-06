<?php
// Test API endpoint dan tampilkan error
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Use curl to get full response
$url = 'http://127.0.0.1/myhr/api/v1/worker/manpower_information';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "HTTP Code: $httpCode\n\n";
echo "Response:\n";
echo $response;
echo "\n";

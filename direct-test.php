<?php
/**
 * Simple Test - Direct Access
 * URL: http://127.0.0.1/myhr/direct-test.php
 */
header('Content-Type: application/json');
echo json_encode([
    'status' => 'OK',
    'message' => 'Direct PHP file execution works!',
    'server' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown',
    'php_version' => phpversion(),
    'timestamp' => date('Y-m-d H:i:s')
], JSON_PRETTY_PRINT);

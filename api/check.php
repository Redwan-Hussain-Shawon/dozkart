<?php
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Send CORS headers for preflight requests
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    exit(0);
}

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: POST'); 
header('Access-Control-Allow-Headers: Content-Type'); 

$data = file_get_contents('php://input');

echo 'post';
?>

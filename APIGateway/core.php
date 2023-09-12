<?php

$jsonData = file_get_contents("php://input");

$data = json_decode($jsonData, true);

if ($data === null) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid JSON DATA']);
} else {
    $xmlData = '<root>';

    header('Content-Type: application/xml');
    echo $xmlData;
}
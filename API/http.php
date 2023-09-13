<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $response = [
        'message' => 'GET',
        'data' => $_GET
    ];
    echo json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestData = json_decode(file_get_contents('php://input'), true);
    $response = [
        'message' => 'POST',
        'data' => $requestData
    ];
    echo json_encode($response);
}

// Обработка других типов запросов:
// ...

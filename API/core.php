<?php

$gotData = [
    'users' => [
        '1' => [
            'username' => 'john',
            'password' => 'ads1rfffber123'
        ],
        '2' => [
            'username' => 'john2',
            'password' => 'hd1rber1233'
        ],
        '3' => [
            'username' => 'john3',
            'password' => 'fd1rber123'
        ],
        '4' => [
            'username' => 'john4',
            'password' => 'xd1rber123'
        ],
        '5' => [
            'username' => 'john5',
            'password' => 'asdd1rber1236'
        ],
    ]
];

$jsonData = json_encode($gotData);

$arrayData = json_decode($jsonData, true);

function arrayToXml($arrayData, $xml = null) {
    if ($xml === null) {
        $xml = new SimpleXMLElement('<root></root>');
    }

    foreach ($arrayData as $key => $value) {
        // Добавляем префикс 'item_' к ключу, если он начинается с цифры
        if (is_numeric(substr($key, 0, 1))) {
            $key = 'item_' . $key;
        }

        if (is_array($value)) {
            arrayToXml($value, $xml->addChild($key));
        } else {
            $xml->addChild($key, htmlspecialchars($value));
        }
    }
    return $xml->asXML();
}

$xmlString = arrayToXml($arrayData);

header('Content-Type: application/xml');

echo $xmlString;
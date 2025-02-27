<?php
//we need this to accept requests from any domain
header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');

//get uri pieces
$uriArray = explode("/", $uri);

if ($uriArray[1] === 'items' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $items = [
        [
            'name' => 'Keychain',
            'price' => '$6.50'
        ],
        [
            'name' => 'Sticker',
            'price' => '$1.25'
        ],
        [
            'name' => 'Hat',
            'price' => '$12.75'
        ]
    ];

    echo json_encode($items);
    exit();
}

if ($uriArray[1] === 'form' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    echo json_encode([
        'message' => 'Success'
    ]);
    exit();
}
?>
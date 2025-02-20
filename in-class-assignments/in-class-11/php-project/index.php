<?php

//we need this to accept requests from any domain
header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');

//get uri pieces
$uriArray = explode("/", $uri);
//var_dump($uriArray);

if ($uriArray[1] === 'camille' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $cats = [
        [
            'firstName' => 'Camille'
        ],
        [
            'nickName' => 'Cami'
        ],
        [
            'lastName' => 'Arreza'
        ]
    ];

    echo json_encode($cats);
    exit();
}

?>
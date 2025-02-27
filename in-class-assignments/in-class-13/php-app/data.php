<?php
require_once 'require.php';
header('Content-Type: application/json');

$data = array(
    "message" => "Hello! " . $required1
);

echo json_encode($data);
?> 
<?php
require_once 'controllers/Notes.php';

$controller = new NoteController();

// If it's a GET request, show the form
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->showForm();
} else {
    // For POST requests, handle the API
    $controller->handleRequest();
}
?> 

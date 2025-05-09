<?php
require_once "../app/models/Model.php";
require_once "../app/models/Item.php";
require_once "../app/controllers/ItemController.php";

// Set environment variables for DB connection
$env = parse_ini_file('../.env');
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);

use app\controllers\ItemController;

// Get the URI and split it into parts
$uri = strtok($_SERVER["REQUEST_URI"], '?');
$uriArray = explode("/", $uri);

// API Routes
if ($uriArray[1] === 'api' && $uriArray[2] === 'items' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $itemController = new ItemController();

    if ($id) {
        $itemController->getItemByID($id);
    } else {
        $itemController->getItems();
    }
}

// View Routes
if ($uriArray[1] === 'items' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($uriArray[2]) ? intval($uriArray[2]) : null;
    $itemController = new ItemController();

    if ($id) {
        $itemController->itemDetailsView();
    } else {
        $itemController->itemsView();
    }
}

include '../public/assets/views/notFound.html';
exit();
?>

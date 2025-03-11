<?php
require_once 'classes/Item.php';

use Store\Item;

// Create a new item
$item = new Item(1, "Tote Bag", 12.50, "Locally sourced 100% recycled cotton material!");

// Echo the JSON output
echo $item->toJson(); 

?>
<?php
require '../app/class/functions.php';
require '../app/class/focusOn.php';
require '../app/class/item.php';

$id = $_GET['id'];

$request = "SELECT * FROM items WHERE item_id = '".$id."'";
$result = fetchObject($request);

$item = new Item($result[0], $id);

require 'html/focus_items.phtml';
 ?>

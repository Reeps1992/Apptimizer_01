<?php

require '../app/class/functions.php';
require '../app/class/focusOn.php';
require '../app/class/form.php';
require '../app/class/item.php';

$id = htmlspecialchars($_GET['id']);

$query = "SELECT * FROM items WHERE item_id = ".$id."";
$result = fetchObject($query);

$item = new Item($result[0], $id);

$form = new Form();

require 'html/modify_items.phtml';

?>

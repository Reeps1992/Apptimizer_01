<?php

require '../app/class/functions.php';
require '../app/class/focusOn.php';
require '../app/class/form.php';
require '../app/class/item.php';
require '../app/class/DB_connect.php';

$id = htmlspecialchars($_GET['id']);

$query = "SELECT * FROM items WHERE item_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$result = $stmt->fetchObject();
$item = new Item($result, $id);

$form = new Form();

require 'html/modify_items.phtml';

?>

<?php
require '../app/class/functions.php';
require '../app/class/focusOn.php';
require '../app/class/DB_connect.php';

$id = htmlspecialchars($_GET['id']);

$query = "SELECT * FROM supplier WHERE supplier_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$result = $stmt->fetchObject();

$supplier = new FocusOn($result, $id);

require 'html/focus_supplier.phtml';
 ?>

<?php

require '../app/class/functions.php';
require '../app/class/focusOn.php';
require '../app/class/customer.php';
require '../app/class/form.php';
require '../app/class/DB_connect.php';

$id = htmlspecialchars($_GET['id']);

$query = "SELECT * FROM customers WHERE customer_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$result = $stmt->fetchObject();
$customer = new Customer($result, $id);

$form = new Form();

require 'html/modify_customers.phtml';

?>

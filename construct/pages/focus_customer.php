<?php
require '../app/class/functions.php';
require '../app/class/focusOn.php';
require '../app/class/customer.php';

$id = $_GET['id'];

$request = "SELECT * FROM customers WHERE customer_id = '".$id."'";
$result = fetchObject($request);

$customer = new Customer($result[0], $id);

require 'html/focus_customer.phtml';
 ?>

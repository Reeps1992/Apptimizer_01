<?php
require '../app/class/functions.php';
require '../app/class/focusOn.php';

$id = $_GET['id'];

$request = "SELECT * FROM supplier WHERE supplier_id = '".$id."'";
$result = fetchObject($request);

$supplier = new FocusOn($result[0], $id);

require 'html/focus_supplier.phtml';
 ?>

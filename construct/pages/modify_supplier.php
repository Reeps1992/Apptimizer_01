<?php

require '../app/class/functions.php';
require '../app/class/focusOn.php';
require '../app/class/form.php';

$id = htmlspecialchars($_GET['id']);

$query = "SELECT * FROM supplier WHERE supplier_id = ".$id."";
$result = fetchObject($query);

$supplier = new FocusOn($result[0], $id);

$form = new Form();

require 'html/modify_supplier.phtml';

?>
<?php
require '../app/class/functions.php';
require '../app/class/DB_connect.php';
require '../app/class/TableHelper.php';

$request = "SELECT * FROM supplier";

$table = new Table($response);

require 'html/supplier.phtml';
?>

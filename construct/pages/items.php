<?php
require '../app/class/functions.php';
require '../app/class/DB_connect.php';
require '../app/class/TableHelper.php';

$request = "SELECT * FROM items";

try {
  $response = fetchObject($request);
} catch (Exception $e) {
  echo $e -> getMessage(), "\n";
}
 $table = new Table($response);
require 'html/items.phtml';
 ?>

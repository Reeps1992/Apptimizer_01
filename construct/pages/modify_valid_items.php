<?php

require '../app/class/functions.php';
require '../app/class/DB_connect.php';

$table = 'items';
$id = htmlspecialchars($_POST['id']);

$part_number = $_POST['part_number'];
$serial_number_item = $_POST['serial_number_item'];
$designation = $_POST['designation'];
$company = str_replace("'"," ", strtoupper($_POST['company']));

$query_customer_id = "SELECT supplier_id FROM supplier WHERE company = '$company'";
$result = request_fetch($query_customer_id);
$supplier_id = $result['supplier_id'];

$query = "UPDATE $table
          SET part_number = ?,
              serial_number_item = ?,
              designation = ?,
              supplier_id = ?
          WHERE item_id = ? ";
$statement = $pdo->prepare($query);

try {
  $statement->execute([htmlspecialchars($part_number), htmlspecialchars($serial_number_item), htmlspecialchars($designation), htmlspecialchars($supplier_id), htmlspecialchars($id)]);
} catch (Exception $e) {
  echo $e -> getMessage(), "\n";
}

header('Location:../public/index.php?p=focus_items&table=items&id='.$id);

 ?>

<?php

require '../app/class/functions.php';

$table = 'items';

$part_number = $_POST['part_number'] ?? null;
$serial_number_item = $_POST['serial_number_item'] ?? null;
$designation = $_POST['designation'] ?? null;
$company = str_replace("'"," ",strtoupper($_POST['company'])) ?? null;

$supplier_id_query = "SELECT supplier_id FROM supplier WHERE company = '$company'";
$result = request_fetch($supplier_id_query);

$supplier_id = $result ?? null;

$check_bool;

$check_list = [$part_number, $serial_number_item, $designation, $company, $supplier_id];

foreach ($check_list as $value) {
  if(is_null($value) || empty($value)){
    $check_bool = false;
    break;
  }
  elseif(!is_null($value) && !empty($value)) {
    $check_bool = true;
  }
}

if($check_bool === true){
  require '../app/class/DB_connect.php';
  $query = "INSERT INTO $table (part_number, serial_number_item, designation, supplier_id) VALUES (?, ?, ?, ?)";
  $statement = $pdo->prepare($query);
  try {
    $statement->execute([htmlspecialchars($part_number), htmlspecialchars($serial_number_item), htmlspecialchars($designation), htmlspecialchars($supplier_id)]);
  } catch (Exception $e) {
    echo $e -> getMessage(), "\n";
  }
}

header('Location:../public/index.php?p=items&table=items');

?>

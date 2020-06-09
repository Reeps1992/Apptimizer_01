<?php

include 'class/DB_connect.php';
include 'class/functions.php';

$query = "SELECT company, supplier_id FROM supplier";
$result = request_fetchAll($query);

$data = [];

foreach ($result as $key => $value) {

  array_push($data, $value['company']);

}

echo json_encode($data);


 ?>

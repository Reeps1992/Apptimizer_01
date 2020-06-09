<?php

include 'class/DB_connect.php';
include 'class/functions.php';

$query = "SELECT part_number, item_id FROM items";
$result = request_fetchAll($query);

$data = [];

foreach ($result as $key => $value) {

  array_push($data, $value['part_number']);

}

echo json_encode($data);


 ?>

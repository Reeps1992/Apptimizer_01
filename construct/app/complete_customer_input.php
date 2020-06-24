<?php

include 'class/DB_connect.php';
include 'class/functions.php';

$query = "SELECT fullname FROM customers";;
$result = request_fetchAll($query);

$data = [];

foreach ($result as $key => $value) {

  array_push($data, $value['fullname']);

}

echo json_encode($data);

 ?>

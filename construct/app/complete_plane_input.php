<?php

include 'class/DB_connect.php';
include 'class/functions.php';

$query = "SELECT immat, plane_id FROM plane";
$result = request_fetchAll($query);

$data = [];

foreach ($result as $key => $value) {

  array_push($data, $value['immat']);

}

echo json_encode($data);


 ?>

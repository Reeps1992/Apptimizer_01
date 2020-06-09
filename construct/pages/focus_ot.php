<?php
require '../app/class/functions.php';
require '../app/class/focusOn.php';
require '../app/class/ot.php';


$id = $_GET['id'];

$request = "SELECT * FROM ot WHERE ot_id = '".$id."'";
$result = fetchObject($request);


$ot = new Ot($result[0], $id);

require 'html/focus_ot.phtml';
 ?>

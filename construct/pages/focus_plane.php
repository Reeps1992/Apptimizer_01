<?php
require '../app/class/functions.php';
require '../app/class/focusOn.php';
require '../app/class/plane.php';

$id = $_GET['id'];

$request = "SELECT * FROM plane WHERE plane_id = '".$id."'";
$result = fetchObject($request);

$plane = new Plane($result[0], $id);

require 'html/focus_plane.phtml';
 ?>

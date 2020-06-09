<?php

require '../app/class/functions.php';
require '../app/class/focusOn.php';
require '../app/class/form.php';
require '../app/class/plane.php';

$id = htmlspecialchars($_GET['id']);

$query = "SELECT * FROM plane WHERE plane_id = ".$id."";
$result = fetchObject($query);

$plane = new Plane($result[0], $id);

$form = new Form();

require 'html/modify_plane.phtml';

?>

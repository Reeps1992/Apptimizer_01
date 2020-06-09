<?php

require '../app/class/functions.php';
require '../app/class/focusOn.php';
require '../app/class/form.php';
require '../app/class/ot.php';

$id = htmlspecialchars($_GET['id']);

$query = "SELECT * FROM ot WHERE ot_id = ".$id."";
$result = fetchObject($query);

$ot = new Ot($result[0], $id);

$form = new Form();

// var_dump($ot);

require 'html/modify_ot.phtml';

?>

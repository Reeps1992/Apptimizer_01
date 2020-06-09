<?php
require '../app/class/functions.php';
require '../app/class/focusOn.php';

$id = $_GET['id'];

$request = "SELECT * FROM users WHERE user_id = '".$id."'";
$result = fetchObject($request);

$user = new FocusOn($result[0], $id);

require 'html/focus_users.phtml';
 ?>

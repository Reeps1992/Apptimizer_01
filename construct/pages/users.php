<?php
require '../app/class/functions.php';
require '../app/class/DB_connect.php';
require '../app/class/TableHelper.php';

$request = "SELECT * FROM users";

$table = new Table($response);

require 'html/users.phtml';
?>

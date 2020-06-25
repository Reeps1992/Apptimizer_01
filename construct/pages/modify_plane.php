<?php

require '../app/class/functions.php';
require '../app/class/focusOn.php';
require '../app/class/form.php';
require '../app/class/plane.php';
require "../app/class/DB_connect.php";

$id = htmlspecialchars($_GET['id']);

$query = "SELECT * FROM plane WHERE plane_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$result = $stmt->fetchObject();

$plane = new Plane($result, $id);

$form = new Form();

require 'html/modify_plane.phtml';

?>

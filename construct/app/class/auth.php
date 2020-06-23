<?php
include 'functions.php';

$Login = htmlspecialchars($_POST['Login']);
$Password = MD5(htmlspecialchars($_POST['Password']));

$query = "SELECT * FROM login WHERE identifiant = '".$Login."' and password = '".$Password."'";

if(request_fetch($query)){
    session_start();
    $_SESSION['user_rights'] = "OK";
    header('Location:../../public/index.php?p=home');
}
else {
	echo "Non";
	header('Location:../../public/index.php');
}

 ?>

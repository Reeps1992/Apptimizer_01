<?php
include 'DB_connect.php';
//
$Login = htmlspecialchars($_POST['Login']);
$Password = htmlspecialchars($_POST['Password']);

$query = "SELECT identifiant, password FROM login WHERE identifiant = ?";
$request = $pdo->prepare($query);
$request->execute([$Login]);
$result = $request->fetch(PDO::FETCH_ASSOC);

if(password_verify($Password, $result['password'])){

    session_start();
    $_SESSION['user_rights'] = "OK";
    header('Location:../../public/index.php?p=home');
}
else {
	echo "Non";
	header('Location:../../public/index.php');
}

 ?>

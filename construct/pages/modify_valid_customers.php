<?php

require '../app/class/functions.php';
require '../app/class/DB_connect.php';

$table = 'customers';
$id = htmlspecialchars($_POST['id']);

$firstname = str_replace("'", " ",ucfirst($_POST['firstname']));
$lastname = str_replace("'"," ",ucfirst($_POST['lastname']));
$email = $_POST['email'];
$phone = $_POST['phone'];
$adress= $_POST['adress'];
$zip_code = $_POST['zip_code'];
$city = strtoupper($_POST['city']);
$fullname = $firstname.' '.$lastname;

$query = "UPDATE customers
          SET firstname = ?,
              lastname = ?,
              email = ?,
              phone = ?,
              adress = ?,
              zip_code = ?,
              city = ?,
              fullname = ?
          WHERE customer_id = ?";
$statement = $pdo->prepare($query);

try {
  $statement->execute([htmlspecialchars($firstname), htmlspecialchars($lastname), htmlspecialchars($email), htmlspecialchars($phone), htmlspecialchars($adress),htmlspecialchars($zip_code),htmlspecialchars($city), htmlspecialchars($fullname),htmlspecialchars($id)]);
} catch (Exception $e) {
  echo $e -> getMessage(), "\n";
}

header('Location:../public/index.php?p=focus_customer&table=customers&id='.$id);

 ?>

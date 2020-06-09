<?php

$table = 'customers';

$firstname = str_replace("'"," ",$_POST['firstname']) ?? null;
$lastname = str_replace("'"," ",$_POST['lastname']) ?? null;
$email = $_POST['email'] ?? null;
$phone = $_POST['phone'] ?? null;
$adress = $_POST['adress'] ?? null;
$zip_code = $_POST['zip_code'] ?? null;
$city = strtoupper($_POST['city']) ?? null;

$check_bool;

$check_list = [$firstname, $lastname, $email, $phone, $adress, $zip_code, $city];

foreach ($check_list as $value) {
  if(is_null($value) || empty($value)){
    $check_bool = false;
    break;
  }
  elseif(!is_null($value) && !empty($value)) {
    $check_bool = true;
  }
}

if($check_bool === true){
  require '../app/class/DB_connect.php';
  $query = "INSERT INTO $table (firstname, lastname, email, phone, adress, zip_code, city, fullname) VALUES (?, ?, ?, ?, ?, ?, UPPER(?), ?)";
  $statement = $pdo->prepare($query);
  try {
    $statement->execute([ucfirst(htmlspecialchars($firstname)), ucfirst(htmlspecialchars($lastname)), htmlspecialchars($email), htmlspecialchars($phone), htmlspecialchars($adress), htmlspecialchars($zip_code), htmlspecialchars($city), htmlspecialchars(ucfirst($firstname).' '.ucfirst($lastname))]);
  } catch (Exception $e) {
    echo $e -> getMessage(), "\n";
  }
}

header('Location:../public/index.php?p=customers&table=customers');

?>

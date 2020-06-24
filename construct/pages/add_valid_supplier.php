<?php

require '../app/class/functions.php';
include '../app/class/requests.php';


$table = 'supplier';

$company = str_replace("'"," ",$_POST['company']) ?? null;
$country = strtoupper($_POST['country']) ?? null;
$email = "'gg@gmail.com'),('a','b','c','d',1,'e','f'" ?? null;
$phone = $_POST['phone'] ?? null;
$adress = $_POST['adress'] ?? null;
$zip_code = $_POST['zip_code'] ?? null;
$city = strtoupper($_POST['city']) ?? null;

$check_bool;

$check_list = [$company, $country, $email, $phone, $adress, $zip_code, $city];

foreach ($check_list as $value) {
  if(is_null($value) || empty($value)){
    $check_bool = false;
    break;
  }
  elseif(!is_null($value) && !empty($value)) {
    $check_bool = true;
  }
}

if($check_bool === true && check_db($table, ['company', $company], ['adress', $adress])){
  require '../app/class/DB_connect.php';
  $query = "INSERT INTO $table (company, country, email, phone, adress, zip_code, city) VALUES (UPPER(?), UPPER(?), ?, ?, ?, ?, UPPER(?))";
  $statement = $pdo->prepare($query);
  try {
    $statement->execute([htmlspecialchars($company), htmlspecialchars($country), htmlspecialchars($email), htmlspecialchars($phone), htmlspecialchars($adress), htmlspecialchars($zip_code), htmlspecialchars($city)]);
  } catch (Exception $e) {
    echo $e -> getMessage(), "\n";
  }
}

header('Location:../public/index.php?p=supplier&table=supplier');

?>

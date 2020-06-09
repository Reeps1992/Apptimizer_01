<?php

$table = 'users';

$firstname = str_replace("'"," ",$_POST['firstname']) ?? null;
$lastname = str_replace("'"," ",$_POST['lastname']) ?? null;
$birthdate = $_POST['birthdate'] ?? null;
$skill_date = $_POST['skill_date'] ?? null;

$check_bool;

$check_list = [$firstname, $lastname, $birthdate, $skill_date];

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
  $query = "INSERT INTO $table (firstname, lastname, birthdate, skill_date, fullname) VALUES (?, ?, ?, ?, ?)";
  $statement = $pdo->prepare($query);
  try {
    $statement->execute([ucfirst(htmlspecialchars($firstname)), ucfirst(htmlspecialchars($lastname)), htmlspecialchars($birthdate), htmlspecialchars($skill_date), htmlspecialchars($firstname.' '.$lastname)]);
  } catch (Exception $e) {
    echo $e -> getMessage(), "\n";
  }
}

header('Location:../public/index.php?p=users&table=users');

?>

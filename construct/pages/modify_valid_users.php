y<?php

require '../app/class/functions.php';
require '../app/class/DB_connect.php';

$table = 'users';
$id = htmlspecialchars($_POST['id']);

$firstname = str_replace("'"," ",$_POST['firstname']);
$lastname = str_replace("'"," ",$_POST['lastname']);
$birthdate = $_POST['birthdate'];
$skill_date = $_POST['skill_date'];
$fullname = $firstname.' '.$lastname;

$query = "UPDATE $table
          SET firstname = ?,
              lastname = ?,
              birthdate = ?,
              skill_date = ?,
              fullname = ?
          WHERE user_id = ?";
$statement = $pdo->prepare($query);

try {
  $statement->execute([htmlspecialchars($firstname), htmlspecialchars($lastname), htmlspecialchars($birthdate), htmlspecialchars($skill_date), htmlspecialchars($fullname),htmlspecialchars($id)]);
} catch (Exception $e) {
  echo $e -> getMessage(), "\n";
}

header('Location:../public/index.php?p=focus_users&table=users&id='.$id);

 ?>

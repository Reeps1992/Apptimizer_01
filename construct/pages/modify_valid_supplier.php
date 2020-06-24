  <?php

require '../app/class/functions.php';
require '../app/class/DB_connect.php';

$table = 'supplier';
$id = htmlspecialchars($_POST['id']);

$company = str_replace("'"," ",strtoupper($_POST['company']));
$adress = $_POST['adress'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$zip_code = $_POST['zip_code'];
$city = strtoupper($_POST['city']);
$country = strtoupper($_POST['country']);

$query = "UPDATE supplier
          SET company = ?,
              adress = ?,
              email = ?,
              phone = ?,
              zip_code = ?,
              city = ?,
              country = ?
          WHERE supplier_id = ?";
$statement = $pdo->prepare($query);

try {
  $statement->execute([htmlspecialchars($company), htmlspecialchars($adress), htmlspecialchars($email), htmlspecialchars($phone), htmlspecialchars($zip_code),htmlspecialchars($city),htmlspecialchars($country),htmlspecialchars($id)]);
} catch (Exception $e) {
  echo $e -> getMessage(), "\n";
}

header('Location:../public/index.php?p=focus_supplier&table=supplier&id='.$id);

 ?>

<?php

require '../app/class/functions.php';
require '../app/class/FolderHelper.class.php';
require '../app/class/DB_connect.php';
include '../app/class/requests.php';


$table = 'plane';

$immat = trim($_POST['immat']);
$serial_number_plane = $_POST['serial_number_plane'];
$type = strtoupper($_POST['type']);
$nationalite = strtoupper($_POST['nationalite']);
$customer_fullname = str_replace("'"," ",$_POST['customer_fullname']);

$query_customer_id = "SELECT customer_id FROM customers WHERE fullname = ?";
$stmt = $pdo->prepare($query_customer_id);
$stmt->execute([htmlspecialchars($customer_fullname)]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$customer_id = $result['customer_id'];

$check_bool;

$check_list = [$immat, $serial_number_plane, $type, $nationalite, $customer_id];

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
  FolderHelper::plane_create_folder($immat);

  if($_FILES['plane_img']['size'] !== '0' && $_FILES['plane_img']['size'] <= '100000'){

    $folder = FolderHelper::get_plane_path1().'/'.$immat.'/DESCRIPTION_IMG';
    $file = $folder.'/'.basename($_FILES['plane_img']['name']);

    echo $file;
    if(FolderHelper::upload($_FILES['plane_img'],$folder)){
      // photo est uploadée
      $query = $insert_plane_request1;
      $statement = $pdo->prepare($query);
      try {
        $statement->execute([htmlspecialchars($immat), htmlspecialchars($serial_number_plane), htmlspecialchars($type), htmlspecialchars($nationalite), $file ,htmlspecialchars($customer_id)]);
      } catch (Exception $e) {
        echo $e -> getMessage(), "\n";
      }
    }else{
    }
  }else {
    $query = $insert_plane_request2;
    $statement = $pdo->prepare($query);
    try {
      $statement->execute([htmlspecialchars($immat), htmlspecialchars($serial_number_plane), htmlspecialchars($type), htmlspecialchars($nationalite), htmlspecialchars($customer_id)]);
    } catch (Exception $e) {
      echo $e -> getMessage(), "\n";
    }
  }
  }else{
  }

header('Location:../public/index.php?p=plane&table=plane');

?>

<?php

require '../app/class/functions.php';
require '../app/class/DB_connect.php';
require '../app/class/FolderHelper.class.php';

$table = 'plane';
$id = htmlspecialchars($_POST['id']);

$immat = $_POST['immat'];
$serial_number_plane = $_POST['serial_number_plane'];
$type = $_POST['type'];
$nationalite = strtoupper($_POST['nationalite']);
$customer_fullname = str_replace("'"," ",$_POST['customer_fullname']);

$query_customer_id = "SELECT customer_id FROM customers WHERE fullname = ?";
$stmt = $pdo->prepare($query_customer_id);
$stmt->execute([$customer_fullname]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$customer_id = $result['customer_id'];


if($_FILES['plane_img']['size'] !== '0' && $_FILES['plane_img']['size'] <= '100000'){ // photo donnée

  $folder = FolderHelper::get_plane_path1().'/'.$immat.'/DESCRIPTION_IMG';
  $file = $folder.'/'.basename($_FILES['plane_img']['name']);

  if(FolderHelper::upload($_FILES['plane_img'],$folder)){
    // photo est uploadée
    $query = "UPDATE plane
    SET immat = ?,
        serial_number_plane = ?,
        type = ?,
        nationalite = ?,
        plane_img = ?,
        customer_id = ?
    WHERE plane_id = ?";
    $statement = $pdo->prepare($query);
    try {
      $statement->execute([htmlspecialchars($immat), htmlspecialchars($serial_number_plane), htmlspecialchars($type), htmlspecialchars($nationalite), $file ,htmlspecialchars($customer_id), htmlspecialchars($id)]);
    } catch (Exception $e) {
      echo $e -> getMessage(), "\n";
    }
  }else{
    // non uploadé
    $query = "UPDATE plane
    SET immat = ?,
        serial_number_plane = ?,
        type = ?,
        nationalite = ?,
        customer_id = ?
    WHERE plane_id = ?";
    $statement = $pdo->prepare($query);
    try {
      $statement->execute([htmlspecialchars($immat), htmlspecialchars($serial_number_plane), htmlspecialchars($type), htmlspecialchars($nationalite), htmlspecialchars($customer_id), htmlspecialchars($id)]);
    } catch (Exception $e) {
      echo $e -> getMessage(), "\n";
    }

  }
}else{
  $query = "UPDATE plane
  SET immat = ?,
      serial_number_plane = ?,
      type = ?,
      nationalite = ?,
      customer_id = ?
  WHERE plane_id = ?";
  $statement = $pdo->prepare($query);
  try {
    $statement->execute([htmlspecialchars($immat), htmlspecialchars($serial_number_plane), htmlspecialchars($type), htmlspecialchars($nationalite), htmlspecialchars($customer_id), htmlspecialchars($id)]);
  } catch (Exception $e) {
    echo $e -> getMessage(), "\n";
  }
}


header('Location:../public/index.php?p=focus_plane&table=plane&id='.$id);

 ?>

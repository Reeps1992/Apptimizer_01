<?php

require "../app/class/functions.php";
require '../app/class/DB_connect.php';

$table = 'ot';
$id = htmlspecialchars($_POST['id']);

$number_ot = $_POST['number_ot'] ?? null;
$title = $_POST['title'] ?? null;
$comment = $_POST['comment'] ?? null;
$start_date = $_POST['start_date'] ?? null;
$end_date = $_POST['end_date'] ?? null;
$archive = $_POST['archive'] ?? null;
$plane_list = [];
$item_list = [];
$state = $_POST['state'] ?? null;
$check_bool;

// filtrer count_plane pour le faire correspondre au nombres d'input 'pleins'

for ($i=0; $i <= $_POST['count_plane'] ;) {
  $tmp_number = 'plane'.$i;
  if(!empty($_POST[$tmp_number])){
    $query = "SELECT plane_id FROM plane WHERE immat = '$_POST[$tmp_number]'";
    $result = request_fetch($query);
    array_push($plane_list, $result['plane_id']);
  }
  $i++;
};

$plane_list = (implode(',', $plane_list));

for ($i=0; $i <= $_POST['count_item'] ;) {
  $tmp_number = 'item'.$i;
  if(!empty($_POST[$tmp_number])){
    $query = "SELECT item_id FROM items WHERE part_number = '$_POST[$tmp_number]'";
    $result = request_fetch($query);
    array_push($item_list, $result['item_id']);
  }
  $i++;
};

$item_list = (implode(',', $item_list));


$query = "UPDATE ot
          SET number_ot = ?,
              title = ?,
              comment = ?,
              start_date = ?,
              end_date = ?,
              archive = ?,
              plane_list = ?,
              item_list = ?,
              state = ?
          WHERE ot_id = ?";
$statement = $pdo->prepare($query);

try {
  $statement->execute([htmlspecialchars($number_ot), htmlspecialchars($title), htmlspecialchars($comment), htmlspecialchars($start_date), htmlspecialchars($end_date), htmlspecialchars($archive), htmlspecialchars($plane_list), htmlspecialchars($item_list), htmlspecialchars($state), htmlspecialchars($id)]);
} catch (Exception $e) {
  echo $e -> getMessage(), "\n";
}

header('Location:../public/index.php?p=focus_ot&table=ot&id='.$id);


?>

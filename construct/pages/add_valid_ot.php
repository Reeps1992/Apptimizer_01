<?php

require "../app/class/functions.php";
include '../app/class/requests.php';
include '../app/class/DB_connect.php';

$table = 'ot';

$number_ot = $_POST['number_ot'] ?? null;
$title = $_POST['title'] ?? null;
$start_date = $_POST['start_date'] ?? null;
$comment = $_POST['comment'] ?? null;
$plane_list = [];
$item_list = [];
$check_bool;

for ($i=0; $i <= $_POST['count_plane'] ;) {
  $tmp_number = 'plane'.$i;
  if(!empty($_POST[$tmp_number])){
    $query = "SELECT plane_id FROM plane WHERE immat = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_POST[$tmp_number]]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    array_push($plane_list, $result['plane_id']);
  }
  $i++;
};

$plane_list = (implode(',', $plane_list));

for ($i=0; $i <= $_POST['count_item'] ;) {
  $tmp_number = 'item'.$i;
  if(!empty($_POST[$tmp_number])){
    $query = "SELECT plane_id FROM plane WHERE immat = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_POST[$tmp_number]]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    array_push($item_list, $result['item_id']);
  }
  $i++;
};

$item_list = (implode(',', $item_list));

$check_list = [$number_ot, $title, $start_date, $comment];

foreach ($check_list as $value) {
  if(is_null($value) || empty($value)){
    $check_bool = false;
    break;
  }
  else if(!is_null($value) && !empty($value)) {
    $check_bool = true;
  }
}

if($check_bool === true){
  $query = $insert_ot_request;
  $statement = $pdo->prepare($query);
  try {
    $statement->execute([htmlspecialchars($number_ot), htmlspecialchars($title), htmlspecialchars($start_date), htmlspecialchars($comment), htmlspecialchars($plane_list), htmlspecialchars($item_list)]);
  } catch (Exception $e) {
    echo $e -> getMessage(), "\n";
  }
}else {
  echo "Erreur";
}

header('Location:../public/index.php?p=ot&table=ot');

?>

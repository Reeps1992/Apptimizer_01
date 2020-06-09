<?php

require "../app/class/functions.php";

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
  require '../app/class/DB_connect.php';
  $query = "INSERT INTO $table (number_ot, title, start_date, comment, plane_list, item_list, state) VALUES (UPPER(?), ?, ?, ?, ?, ?, 0)";
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

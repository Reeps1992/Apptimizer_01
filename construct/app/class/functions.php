<?php

// --------------- FUNTCION CHECK-DB -------------------------------------------

// en construction pour remplacer les 3 autres *******************

function check_db(string $table, array $array1, array $array2 ) {
  require 'DB_connect.php';
  $data = "SELECT $array1[0], $array2[0]
  FROM $table
  WHERE $array1[0] = '$array1[1]'
  AND $array2[0] = '$array2[1]'";
  if(request_fetchAll($data)){
    return false;
  }else {
    return true;
  }
}

// --------------- OT_SPECIALS -------------------------------------------------

function ot_rq_plane_list($value)
{
  $query = "SELECT immat FROM plane WHERE plane_id = $value";
  return $query;
}

function ot_rq_item_list($value)
{
  $query = "SELECT part_number FROM items WHERE item_id = $value";
  return $query;
}

// --------------- FUNTCION REQUEST --------------------------------------------

function request_fetch($e){
    include 'DB_connect.php';
    $stmt = $pdo->prepare($e);
    $stmt->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
};

function request_fetchAll($e){
  include 'DB_connect.php';
  $stmt = $pdo->prepare($e);
  $stmt->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  return $result;
};

function fetchObject($e){
  include 'DB_connect.php';
  $stmt = $pdo->prepare($e);
  $stmt->execute();
  $results = array();
  while ($result = $stmt->fetchObject()){
      $results[] = $result;
  }
  return $results;
};



?>

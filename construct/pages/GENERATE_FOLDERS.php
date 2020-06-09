<?php

// CREER LES DOSSIERS RELATIFS A LA BDD

require '../app/class/functions.php';
require '../app/class/DB_connect.php';
require '../app/class/FolderHelper.class.php';

// Création dossiers ot_id

function create_folder_1(){
  $query = "SELECT immat FROM plane";
  $results = request_fetchAll($query);

  foreach ($results as $result) {
    if (!is_null($result['immat'])) {
      FolderHelper::plane_create_folder($result['immat']);
    }
  };
};


// Création des dossiers PN

function create_folder_2()
{
  $query = "SELECT part_number FROM items";
  $results = request_fetchAll($query);

  foreach ($results as $result) {
    if (!is_null($result['part_number'])) {
      FolderHelper::item_create_folder($result['part_number']);
    }
  }
};


// Création des sous dossiers OT

function create_folder_3()
{
  $query = "SELECT ot_id, number_ot FROM ot";
  $results = request_fetchAll($query);
  foreach ($results as $result) {
    FolderHelper::ot_create_folder($result['number_ot']);
    $ot_id = $result['ot_id'];
    $number_ot = $result['number_ot'];
    $base = '../../DATA/OT/';
    $img = ['img_path' => '/IMG'];
    $pdf = ['pdf_path' => '/PDF'];
    $crs = ['crs_path' => '/CRS'];
    $easa = ['easa_path' => '/EASA'];
    $links = [$easa, $pdf, $crs, $img];
    foreach ($links as $value) {
      require '../app/class/DB_connect.php';
      $link = $base.$number_ot.$value[key($value)];
      $query = "UPDATE ot SET ".key($value)." = '$link' WHERE ot_id = $ot_id";
      $statement = $pdo->prepare($query);
      $statement->execute();
    }
  }
};



function init(){
  create_folder_1();
  create_folder_2();
  create_folder_3();
}

// ****************************************************************************


init();

?>

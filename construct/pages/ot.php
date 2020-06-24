<?php
require '../app/class/functions.php';
require '../app/class/DB_connect.php';
require '../app/class/TableHelper.php';

$request = "SELECT * FROM ot";

// ******** Requête pour barre de recherche ************************************

if(!empty($_GET['selected']) && !empty($_GET['q'])) {
  $request .= "WHERE " . htmlspecialchars($_GET['selected']) . " LIKE '%". htmlspecialchars($_GET['q']) ."%'";
}

if(!empty($_GET['sort'])){
    $direction = $_GET['dir'] ?? 'asc';
    if(!in_array($direction, ['asc', 'desc'])){
        $direction = 'asc';
    }
    $request .= " ORDER BY " . $_GET['sort'] . " $direction";
}

// *****************************************************************************

try {
  $response = fetchObject($request);
} catch (Exception $e) {
  echo $e -> getMessage(), "\n";
}
 $table = new Table($response);
require 'html/ot.phtml';
 ?>

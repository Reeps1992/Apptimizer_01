<?php
/**
 *
 */
class Customer extends FocusOn
{
  public function get_plane_by_id_customer()
  {
    include 'DB_connect.php';
    $query = "SELECT plane_id, immat FROM plane WHERE customer_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$this->id]);
    $results = array();
    while ($result = $stmt->fetchObject()){
        $results[] = $result;
    }
    return $results;
  }
}

 ?>

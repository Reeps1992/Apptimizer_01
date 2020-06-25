<?php
/**
 *
 */
class Item extends FocusOn
{
  public function getSupplier($id)
  {
    include 'DB_connect.php';
    $query = "SELECT company FROM supplier WHERE supplier_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $supplier = $stmt->fetchObject();
    if(is_null($supplier) || $supplier == false){
      return "Erreur dans la recherche du fournisseur de ce matériel.";
    }else{
      return $supplier->company;
    }
  }

  public function getOtList($id)
  {
    $ot_list = [];
    $query = "SELECT ot_id, number_ot, item_list FROM ot";
    $result = request_fetchAll($query);
    foreach ($result as $key => $value) {
      $result2 = explode(',' , $result[$key]['item_list']);
      if (in_array($id, $result2)) {
        $tmp_result = [$value['ot_id'] => $value['number_ot']];
        array_push($ot_list, $tmp_result);
      }
    }
    return $ot_list;
  }

}

?>

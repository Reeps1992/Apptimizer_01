<?php
/**
 *
 */
class Item extends FocusOn
{
  public function getSupplier($id)
  {
    $query = "SELECT company FROM supplier WHERE supplier_id = ".$id."";
    $supplier = fetchObject($query);
    if(is_null($supplier)){
      return "Inconnu";
    }else{
      return $supplier[0]->company;
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

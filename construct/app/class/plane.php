<?php
/**
 *
 */
class Plane extends FocusOn
{

  public function getOwner()
  {
    $query = "SELECT fullname FROM customers WHERE customer_id = ". $this->getDataAbout('customer_id');
    $result = fetchObject($query);
    return $result[0]->fullname;
  }

  public function getOtList($id)
  {
    $ot_list = [];
    $query = "SELECT ot_id, number_ot, plane_list FROM ot";
    $result = request_fetchAll($query);
    foreach ($result as $key => $value) {
      $result2 = explode(',' , $result[$key]['plane_list']);
      if (in_array($id, $result2)) {
        $tmp_result = [$value['ot_id'] => $value['number_ot']];
        array_push($ot_list, $tmp_result);
      }
    }
    return $ot_list;
  }


}
 ?>

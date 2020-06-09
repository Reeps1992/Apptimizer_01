<?php
/**
 *
 */
class Ot extends FocusOn
{
  // fonction remplacée par une fonction OT_SPECIALS de functions.php
  public function getPlaneList($id)
  {
    $plane_list = [];
    $query = "SELECT immat, key_ot FROM plane";
    $result = request_fetchAll($query);
    foreach ($result as $key => $value) {
      $tmp_val = explode(',', $value['key_ot']);
      if(in_array($id, $tmp_val)){
        array_push($plane_list, $value['immat']);
      }
    }
    return $plane_list;
  }


  // fonction remplacée par une fonction OT_SPECIALS de functions.php
  public function getItemList($id)
  {
    $item_list = [];
    $query = "SELECT item_id, part_number, key_ot FROM items";
    $result = request_fetchAll($query);
    foreach ($result as $value) {
      $tmp_val = explode(',' , $value['key_ot']);
      if(in_array($id, $tmp_val)){
        array_push($item_list, [$value['item_id'] => $value['part_number']]);
      }
    }
    return $item_list;
  }

  public function getState()
  {
    $state = $this->getDataAbout('state');
    $result;
    switch ($state) {
      case 0:
        $result ='<p class="alert alert-success">En cours</p>';
        break;
      case 1:
        $result ='<p class="alert alert-danger">Fermé</p>';
        break;
      default:
        $result ='<p class="alert alert-warning">Etat non confirmé</p>';
        break;
    }
    return $result;
  }

}

 ?>

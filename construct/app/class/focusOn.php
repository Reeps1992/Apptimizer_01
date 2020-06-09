<?php
/**
 *
 */
class FocusOn
{
  protected $data;
  protected $id;

  function __construct($data, $id)
  {
    $this->data = $data;
    $this->id = $id;
  }

  public function getDataAbout($thing){
    return $this->data->$thing;
  }

  public function getById($thing, $here, $id_col_name)
  {
    $query = "SELECT ".$thing." FROM ".$here." WHERE ".$id_col_name." = ".$this->id."";
    return fetchObject($query);
  }
}

?>

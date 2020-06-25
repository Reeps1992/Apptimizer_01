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

}

?>

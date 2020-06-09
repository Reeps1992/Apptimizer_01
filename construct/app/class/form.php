<?php

/**
 * Class qui permet de créer des formulaires facilement et rapidement
 */
class Form
{

  protected $data;
  public $surround = 'div';
  public $surroundClass = 'form-group';

  function __construct($data = array())
  {
    $this->data = $data;
  }

  public function getData()
  {
    return $this->data;
  }

  protected function surround($html){
    return "<{$this->surround} class='$this->surroundClass'>$html</$this->surround>";
  }

  public function label($name, $public_name)
  {
    return "<label for='$name'>".$public_name."</label>";
  }

  public function input($name, $value)
  {
    return $this->surround('<input class="form-control" type="'.$value.'" name="'. $name .'"></input>');
  }

  public function modify_input($name, $type, $value)
  {
    return $this->surround('<input class="form-control" type="'.$type.'" name="'. $name .'" value="'. $value .'"></input>');

  }

  public function textarea($name)
  {
    return $this->surround('<textarea col="8" row="8" name="'. $name .'"></textarea>');
  }

  public function submit()
  {
    return '<button type="submit" class="btn btn-success">Valider</button>';
  }

  public function fileInput($name)
  {
    return '<div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="'.$name.'" name="'.$name.'" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="'.$name.'">Choisir une image</label>
              </div>
            </div>';
  }

}


 ?>

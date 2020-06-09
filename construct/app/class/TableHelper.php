<?php
/**
 *  permet de créer des tableaux à partir de la DB
 */
   require 'URLHelper.class.php';
class Table
{


  private $data;
  private $surround = 'td';
  const SORT_KEY = 'sort';
  const DIR_KEY = 'dir';

  function __construct($data)
  {
    $this->data = $data;
  }

  public static function sort(string $sortKey, string $label, array $sort_data): string
  {

      $sort = $sort_data[self::SORT_KEY] ?? null;
      $direction = $sort_data[self::DIR_KEY] ?? null;
      $icon = "";
      if($sort === $sortKey){
          $icon = $direction === "asc" ?  "<i class='fas fa-arrow-up'></i>" : "<i class='fas fa-arrow-down'></i>";

      }
      $url = URLHelper::withParams($sort_data, [
          'sort' => $sortKey,
          'dir' => $direction === 'asc' && $sort === $sortKey ? 'desc' : 'asc'
          ]);

      return <<<HTML
      <a href="?$url">$label $icon </a>
HTML;

  }

  public function getData()
  {
    return $this->data;
  }

  public function setSurround($surround)
  {
    $this->surround = $surround;
  }

  private function surround($html){
    return "<{$this->surround}>$html</{$this->surround}>";
  }

  public static function colTitle(array $titles)
  {
    $html_colTilte = "<thead> ";
    $values = [];
    foreach ($titles as $value) {
      $values[] = "<th>". $value ."</th>";
    }
    $values = implode($values);
    $html_colTilte .= $values . "</thead>";
    return $html_colTilte;
  }

  public function resultsOf($thing){
    $results = [];
    for($i=0; $i < count($this->data); $i++){
      $results[] = $this->data[$i]->$thing;
    }
    return $results;
  }



}



 ?>

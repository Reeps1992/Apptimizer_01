<?php
require "../app/class/form.php";

$data = [
         'part_number' => ['name' => 'P/N',             'type' => 'text'],
  'serial_number_item' => ['name' => 'Numéro de série', 'type' => 'text'],
         'designation' => ['name' => 'Désignation',     'type' => 'text'],
             'company' => ['name' => 'Fournisseur',     'type' => 'text'],
        ];

$form = new Form($data);

require 'html/add_items.phtml';

?>

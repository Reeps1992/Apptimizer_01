<?php
require "../app/class/form.php";

$data = [
           'company' => ['name' => 'Fournisseur', 'type' => 'text'],
            'adress' => ['name' => 'Adresse', 'type' => 'text'],
              'city' => ['name' => 'Ville', 'type' => 'text'],
          'zip_code' => ['name' => 'Code postal', 'type' => 'text'],
           'country' => ['name' => 'Pays' , 'type' => 'text'],
             'email' => ['name' => 'Email', 'type' => 'email'],
             'phone' => ['name' => 'Téléphone', 'type' => 'text']

        ];

$form = new Form($data);

require 'html/add_supplier.phtml';

?>

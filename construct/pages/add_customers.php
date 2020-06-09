<?php
require "../app/class/form.php";

$data = [
         'firstname' => ['name' => 'Prénom', 'type' => 'text'],
          'lastname' => ['name' => 'Nom', 'type' => 'text'],
             'email' => ['name' => 'Email', 'type' => 'email'],
             'phone' => ['name' => 'Téléphone', 'type' => 'phone'],
            'adress' => ['name' => 'Adresse', 'type' => 'text'],
          'zip_code' => ['name' => 'Code postal', 'type' => 'number'],
              'city' => ['name' => 'Ville' , 'type' => 'text']
        ];
        
$form = new Form($data);

require 'html/add_customers.phtml';

?>

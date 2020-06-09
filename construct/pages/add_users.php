<?php
require "../app/class/form.php";

$data = [
         'firstname' => ['name' => 'Prénom', 'type' => 'text'],
          'lastname' => ['name' => 'Nom', 'type' => 'text'],
         'birthdate' => ['name' => 'Date de naissance', 'type' => 'date'],
        'skill_date' => ['name' => 'Date d\'habilition', 'type' => 'date'],
        ];

$form = new Form($data);

require 'html/add_users.phtml';

?>

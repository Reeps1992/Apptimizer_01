<?php
require "../app/class/form.php";

$data = [
         'number_ot' => ['name' => 'Numéro d\'OT', 'type' => 'text'],
             'title' => ['name' => 'Titre', 'type' => 'text'],
        'start_date' => ['name' => 'Date de début', 'type' => 'date'],
           'comment' => ['name' => 'Commentaire', 'type' => 'text']
        ];

$form = new Form($data);

require 'html/add_ot.phtml';

?>

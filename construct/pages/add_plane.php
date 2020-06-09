<?php
require "../app/class/form.php";

$data = [
                      'immat' => ['name' => 'Immatriculation', 'type' => 'text'],
        'serial_number_plane' => ['name' => 'Numéro de série', 'type' => 'text'],
                       'type' => ['name' => 'Type', 'type' => 'text'],
                'nationalite' => ['name' => 'Nationalité', 'type' => 'text']
              ];

$form = new Form($data);

require 'html/add_plane.phtml';

?>

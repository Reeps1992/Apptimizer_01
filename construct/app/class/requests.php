<?php

$auth_request = "SELECT identifiant, password FROM login WHERE identifiant = ?";

$insert_customer_request = "INSERT INTO customers (firstname, lastname, email, phone, adress, zip_code, city, fullname) VALUES (?, ?, ?, ?, ?, ?, UPPER(?), ?)";

$insert_item_request = "INSERT INTO items (part_number, serial_number_item, designation, supplier_id) VALUES (?, ?, ?, ?)";

$insert_ot_request = "INSERT INTO ot (number_ot, title, start_date, comment, plane_list, item_list, state) VALUES (UPPER(?), ?, ?, ?, ?, ?, 0)";

$insert_plane_request1 = "INSERT INTO plane (immat, serial_number_plane, type, nationalite, plane_img, customer_id) VALUES (upper(?), ?, ?, upper(?),?,?)";

$insert_plane_request2 = "INSERT INTO plane (immat, serial_number_plane, type, nationalite, customer_id) VALUES (upper(?), ?, ?, upper(?), ?)";

$insert_supplier_request = "INSERT INTO supplier (company, country, email, phone, adress, zip_code, city) VALUES (UPPER(?), UPPER(?), ?, ?, ?, ?, UPPER(?))";

$insert_user_request = "INSERT INTO users (firstname, lastname, birthdate, skill_date, fullname) VALUES (?, ?, ?, ?, ?)";


 ?>

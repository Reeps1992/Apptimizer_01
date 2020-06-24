<?php

 $dsn = 'mysql:dbname=apptimizer_siba;host=localhost;port=3307;';
 $user = 'root';
 $password = '';

 try {
     $pdo = new PDO($dsn, $user, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
     $pdo->query('SET NAMES UTF8');

 } catch (PDOException $e) {
     echo 'Connexion échouée : ' . $e->getMessage();
 }
?>

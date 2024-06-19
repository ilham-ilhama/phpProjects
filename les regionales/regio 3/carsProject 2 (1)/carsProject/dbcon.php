<?php
    $host = 'localhost';
    $dbname = 'cars_db';
    $password = '';
    $user='root';
    $dsn = "mysql:host=$host;dbname=$dbname";
    try{
       $connexion  = new PDO($dsn,$user,$password);
        //$message = "connexion avec la DB est etabli avec succes";
    }
    catch(PDOException $e ){
        die("Impossible de se connecter à la base de donnée $dbname :" . $e->getMessage());
    }
 
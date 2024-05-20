<?php
$host = 'localhost';
$port = 3306;
$dbName = 'inscreption';
$user = 'root';
$password = '';
$dsn = "mysql:host ={$host};port={$port};dbname={$dbName};charset=utf8";

try{
    $pdo = new PDO($dsn,$user,$password);
    echo "success";
}catch(PDOException $e){
    echo"fail" . $e->getMessage(); 
}

?>
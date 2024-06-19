<?php
$host = 'localhost';
$port = 3306;
$dbName = 'control';
$user = 'root';
$password = '';
$dsn = "mysql:host ={$host};port={$port};dbname={$dbName};charset=utf8";

try{
    $con = new PDO($dsn,$user,$password);
    echo "success";
}catch(PDOException $e){
    echo"fail" . $e->getMessage(); 
}
?>
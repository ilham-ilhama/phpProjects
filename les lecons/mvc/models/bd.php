<?php
function connecter(){

    $host = 'localhost';
    $port = 3306;
    $dbName = 'inscreption';
    $user = 'root';
    $password = '';
    $dsn = "mysql:host ={$host};port={$port};dbname={$dbName};charset=utf8";

    try{
        $pdo = new PDO($dsn,$user,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}


function getListeArticles(){
    $pdo = connecter();
    $statement = $pdo->prepare('SELECT * from stagiaire');
    $statement ->execute();
    $articles = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $articles;
}

?>
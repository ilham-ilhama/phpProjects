<?php
session_start();
require 'connBD.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST["user"])&& isset($_POST["password1"])){
        $statement = $pdo ->prepare("SELECT * FROM client WHERE user =:user AND password1 = :password1");
        $statement ->execute([
            ':user' =>$_POST['user'],
            ':password1' =>$_POST['password1'],
        ]);
        $admin = $statement -> fetch(PDO::FETCH_ASSOC);
        var_dump($admin);
        die();
        if($admin){
            $_SESSION['user'] = $user;
            header("location:inscrire.php");
            exit;
        }else{
            header("location:connEmp.php");
        }
    }
}
?>
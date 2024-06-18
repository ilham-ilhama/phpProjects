<?php
session_start();//pour les donne

require 'connBD.php';
//method 

if($_SERVER['REQUEST_METHOD'] ==='POST'){
   
    //name 
    if(isset($_POST["user"]) || isset($_POST["password1"])){
        
                                                                //base de donne 
        $statement = $pdo ->prepare("SELECT * FROM client WHERE email =:user AND password = :password1");
        $statement ->execute([
            ':user' =>$_POST['user'],
            ':password1' =>$_POST['password1'],
        ]);
        $admin = $statement -> fetch(PDO::FETCH_ASSOC);//objet liste
        var_dump($admin);
        die();
       
        if($admin){ //pour  vairifier est ce que employer connecte
            $_SESSION['user'] = $user;
            header("location:inscrire.php");
            exit;
        }else{
            header("location:connEmp.php");
        }
    }
}
?>
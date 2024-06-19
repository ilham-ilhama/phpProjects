<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];

        include("connexion.php");

        $sql="DELETE FROM clients WHERE id=$id";
        $result=$con->query($sql);
    }
    header("location:acceuil.php");
    exit;
?>
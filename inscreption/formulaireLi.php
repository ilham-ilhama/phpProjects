<link rel="stylesheet" href="styleFormulaire.css"/>
<form action="" method="POST" >
        <label>Id:</label>
        <input type="text" name="id" id="myid">
        <label>Nom:</label>
        <input type="text" name="nom" id="name">

        <label>Prenom:</label>
        <input type="text" name="prenom" id="firstname">

        <button type="submit">Submit</button>
    </form>
   

<?php
require "inscreption.php";

$statement = $pdo->prepare('INSERT INTO stagiaire(id,nom,prenom) VALUES (:id, :nom, :prenom)');

$statement->execute([
    ':id'=> $_POST['id'],
    ':nom' => $_POST['nom'],
    ':prenom' =>$_POST['prenom']
]);
?>

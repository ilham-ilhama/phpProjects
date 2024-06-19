<?php 
    ob_start();
    include_once '../header.php';
    include_once '../dbcon.php';

    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: ../login.php");
        exit;
    }
    else{
        

        if(isset($_POST['submit'])){
            $idUser = $_SESSION['user_id'];
            $r1= "SELECT * FROM client where idUser=$idUser";
            $stmt1 = $connexion->query($r1);
            $client = $stmt1->fetch();
            $idClient = $client["idClient"] ;
            $matricule = $_POST['matricule'];
            $marque = $_POST['marque'];
            $annee = $_POST['annee'];
            
            $sql = "INSERT into voiture (matricule,marque,annee,idClient) values('$matricule','$marque',$annee,$idClient)";
            $resultat = $connexion->query($sql);
            if($resultat){
                //$message = 'Les donnees sont Bien ajouter';
                header("location:listVoitures.php");
                exit;
            }
            else{
                echo "Erreur d'insertion des donnees";
            }
        }
        
    }
    ob_end_flush();
?>

    <div class="container">
        <br>
        <h2 class="text-center"> Ajouter une nouvelle voiture </h2>
        <form action="createVoiture.php" method='post'>
        <?php
            if(isset($message)){
                echo $message;
            }
            ?>
            <div class="mb-3">
                <label for="matricule" class="form-label">Matricule</label>
                <input type="text" name="matricule" class="form-control" id="matricule" >
            </div>
            <div class="mb-3">
                <label for="marque" class="form-label">Marque</label>
                <input type="text" name="marque" class="form-control" id="marque" >
            </div>
            <div class="mb-3">
                <label for="annee" class="form-label">Annee</label>
                <input type="number" step="0.5" name="annee" class="form-control" id="annee" >
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</body>
</html>
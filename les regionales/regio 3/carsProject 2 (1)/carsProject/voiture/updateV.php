<?php
    ob_start();
    include_once '../header.php';
    include_once '../dbcon.php';
    
    if(isset($_POST['submit'])){
        
        $matricule = $_POST['matricule'];
        $marque = $_POST['marque'];
        $annee = $_POST['annee'];
        
        $sql = "UPDATE  voiture set matricule='$matricule',marque= '$marque',annee=$annee where matricule='$matricule'";
        $resultat = $connexion->query($sql);
        if($resultat){
            
            header("location: listVoitures.php");
            
            exit;
        }
        else{
            echo "Erreur d'insertion des donnees";
        }
    }
    else{
        $matricule = $_GET["matricule"];
        $r = "SELECT * from voiture WHERE matricule = '$matricule'";
        $stmt = $connexion->query($r);
        $v = $stmt->fetch();
    }
    ob_end_flush();
?>

    <div class="container">
        <br>
        <h2 class="text-center"> Ajouter une nouvelle voiture </h2>
        <form action="updateV.php" method='post'>
        
            <div class="mb-3">
                <label for="matricule" class="form-label">Matricule</label>
                <input type="hidden" name="matricule" class="form-control" id="matricule" value="<?= $v["matricule"]?>">
                <input type="text" name="mat" class="form-control" id="mat" value="<?= $v["matricule"]?>" disabled>

            </div>
            <div class="mb-3">
                <label for="marque" class="form-label">Marque</label>
                <input type="text" name="marque" class="form-control" id="marque" value="<?= $v["marque"]?>">
            </div>
            <div class="mb-3">
                <label for="annee" class="form-label">Annee</label>
                <input type="number" step="0.5" name="annee" class="form-control" id="annee" value="<?= $v["annee"]?>" >
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</body>
</html>
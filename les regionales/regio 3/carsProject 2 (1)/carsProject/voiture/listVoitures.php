<?php 
    include_once "../header.php";
    include_once '../dbcon.php';
    session_start();

    // Vérifier si l'utilisateur est connecté
     if (!isset($_SESSION['user_id'])) {
        header('Location: ../login.php');
        exit;
    }
    else{
        $idUser=$_SESSION['user_id'];
        $r1= "SELECT * FROM client where idUser=$idUser";
        $stmt1 = $connexion->query($r1);
        $client = $stmt1->fetch();
        $nom = $client["raisonSocial"];
        $idClient = $client["idClient"] ;
        if(isset($_GET["matricule"])){
            $matricule = $_GET["matricule"];
            $r = "DELETE FROM voiture where matricule ='$matricule'";
            $stmt = $connexion->query($r);
        }
      
        $sql = "SELECT * from voiture where idClient = $idClient";
        $resultat = $connexion->query($sql);
    }
?>
    <div class="container text-center" >
        <h2 class="text-center">Liste des Voitures de <?=$nom ?></h2>
        <table class="table" >
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Marque</th>
                    <th>Annee</th>
                    <th>Réparations</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <?php
        
                while ($row = $resultat->fetch(PDO::FETCH_ASSOC)){
                ?>
                    <tr>
                        <td><?php echo $row ['matricule'] ?></td>
                        <td><?php echo $row ['marque'] ?></td>
                        <td><?php echo $row ['annee'] ?></td>
                        <td>
                            <a class="btn btn-primary" href="../reparation/listRepV.php?matricule=<?php echo $row ['matricule'] ?>">afficher</a>
                            </td>
                        <td>
                            <a class="btn btn-primary" href="updateV.php?matricule=<?php echo $row ['matricule'] ?>">modifier</a>
                            <a class="btn btn-danger" href="listVoitures.php?matricule=<?php echo $row ['matricule'] ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
    
        </table>
    </div>
 </body>
 </html>
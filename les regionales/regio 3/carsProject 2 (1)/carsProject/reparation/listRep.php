<?php 
    include_once "../header.php";
    include_once '../dbcon.php';
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("location:../login.php");
        exit;
    }
    else{
    /*if(isset($_SESSION['user_id'])){
            $idUser=$_SESSION['user_id'];
            $r2 = $connexion->query("SELECT * FROM reparation WHERE idRep = $idUser");
            $rep = $r2->fetch();
            $idrep = $rep["idRep"];


         }*/
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $r = "DELETE FROM reparation where idRep =$id";
            $stmt = $connexion->query($r);
        }

        $idUser = $_SESSION['user_id'];

        $r1= "SELECT * FROM client where idUser=$idUser";
        $stmt1 = $connexion->query($r1);
        $client = $stmt1->fetch();
        $idClient = $client["idClient"] ;

        $sql = "SELECT * 
                from reparation,voiture
                where voiture.matricule = reparation.matricule
                and voiture.idClient=$idClient
                ";
        $resultat = $connexion->query($sql);
        }
?>
    <div class="container text-center" >
        <h2 class="text-center">Liste des reparations</h2>
        <table class="table" >
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Cout</th>
                    <th>Date reparation</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <?php
        
                while ($row = $resultat->fetch(PDO::FETCH_ASSOC)){
                ?>
                    <tr>
                        <td><?php echo $row ['matricule'] ?></td>
                        <td><?php echo $row ['cout'] ?></td>
                        <td><?php echo $row ['dateRep'] ?></td>
                        <td><?php echo $row ['description'] ?></td>

                        <td>
                            <a class="btn btn-primary" href="updateRep.php?id=<?php echo $row ['idRep'] ?>">modifier</a>
                            <a class="btn btn-danger" href="listRep.php?id=<?php echo $row ['idRep'] ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
    
        </table>
    </div>
 </body>
 </html>
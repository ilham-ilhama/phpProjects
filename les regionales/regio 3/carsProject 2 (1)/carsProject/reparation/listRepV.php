<?php 
    include_once "../header.php";
    include_once '../dbcon.php';
    
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $r = "DELETE FROM reparation where idRep =$id";
        $stmt = $connexion->query($r);
    }
    if(isset($_GET["matricule"])){
        $m = $_GET["matricule"];
        $sql = "SELECT * from reparation where matricule ='$m'";
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
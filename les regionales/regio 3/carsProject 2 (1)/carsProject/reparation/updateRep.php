<?php
    ob_start();
    include_once '../header.php';
    include ('../dbcon.php');
    $sql = "SELECT * from voiture";
    $result = $connexion->query($sql);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $date = $_POST['date'];
        $cout = $_POST['cout'];
        $desc = $_POST['desc'];
        $id = $_POST['id'];
        $r = "UPDATE reparation SET dateRep ='$date' ,cout= $cout,description = '$desc' where idRep = $id";
        $stm = $connexion->query($r);
        header("Location: listRep.php");
        exit;

    }
    else{
        $id = $_GET["id"];
        $rq = "SELECT * FROM reparation where idRep = $id";
        $stmt = $connexion->query($rq);
        $rep = $stmt->fetch();
    }
                    
?>
    <div class="container">
        <br>
        <h2 class="text-center"> Ajouter une nouvelle voiture </h2>
    <form action="updateRep.php" method='post'>
        <div class="mb-3">
            <label for="matricule">Matricule</label>
            <input type="text" name="mat" class="form-control" id="mat"  value="<?= $rep["matricule"] ?>" disabled>
            <input type="hidden" name="id" class="form-control" id="id"  value="<?= $rep["idRep"] ?>">

        </div>
        
        <div class="mb-3">
            <label for="marque" class="form-label">Date reparation</label>
            <input type="date" name="date" class="form-control" id="date"  value="<?= $rep["dateRep"] ?>">
        </div>
        <div class="mb-3">
            <label for="cout" class="form-label">Cout</label>
            <input type="number" step="0.5" name="cout" class="form-control" id="cout" value="<?= $rep["cout"] ?>">
        </div>
        <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <textarea class="form-control" name="desc" id="desc" rows="10" cols="10" ><?= $rep["description"] ?></textarea>
    
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Ajouter reparation</button>
       
    </form>
</body>
</html>
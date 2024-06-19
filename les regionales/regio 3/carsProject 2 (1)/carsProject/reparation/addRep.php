<?php
    ob_start();
    include_once '../header.php';
    include ('../dbcon.php');
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("location:../login.php");
        exit;
    }
    else{
        $idUser = $_SESSION['user_id'];

        $r1= "SELECT * FROM client where idUser=$idUser";
        $stmt1 = $connexion->query($r1);
        $client = $stmt1->fetch();
        $idClient = $client["idClient"] ;

        $sql = "SELECT * from voiture where idClient = $idClient";
        $result = $connexion->query($sql);

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $matricule = $_POST['matricule'];
            $date = $_POST['date'];
            $cout = $_POST['cout'];
            $desc = $_POST['desc'];
            $r = "INSERT INTO reparation (matricule,dateRep,cout,description) values('$matricule','$date',$cout,'$desc')";
            $stm = $connexion->query($r);
            header("Location: listRep.php");
            exit;

        }
    }          
?>
    <div class="container">
        <br>
        <h2 class="text-center"> Ajouter une nouvelle voiture </h2>
    <form action="addRep.php" method='post'>
        <div class="mb-3">
            <label for="matricule">Matricule</label>
            <select class="form-select" name="matricule">
                <?php
                    while($row = $result->fetch()){
                ?>
                <option value="<?php echo $row['matricule'] ?>"><?php echo $row['matricule'] ?></option>
                <?php
                }
                ?>     
            </select>
        </div>
        
        <div class="mb-3">
            <label for="marque" class="form-label">Date reparation</label>
            <input type="date" name="date" class="form-control" id="date" >
        </div>
        <div class="mb-3">
            <label for="cout" class="form-label">Cout</label>
            <input type="number" step="0.5" name="cout" class="form-control" id="cout" >
        </div>
        <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <textarea class="form-control" name="desc" id="desc" rows="10" cols="10"></textarea>
    
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Ajouter reparation</button>
       
    </form>
</body>
</html>
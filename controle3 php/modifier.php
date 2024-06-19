<?php
    include("connexion.php");

    $name="";
    $email="";
    $phone="";
    $Adress="";
    $errorMessage="";
    $successMessage="";

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(!isset($_GET["id"])){
            header("location:acceuil.php");
            exit;
        }
        $id=$_GET["id"];

        $sql="SELECT * FROM clients WHERE id=$id";
        $result=$con->query($sql);
        $row=$result->fetch();

        if(!$row){
            header("location:acceuil.php");
            exit;
        }

        $name=$row['name'];
        $email=$row['email'];
        $phone=$row['phone'];
        $Adress=$row['Adress'];
    }
    else{
        $id=$_POST['id'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $Adress=$_POST['Adress'];

        do{
            if(empty($name) || empty($email) || empty($phone) || empty($Adress)){
                $errorMessage="All the fields are required";
                break;
            }

            $sql1="UPDATE clients SET name='$name', email='$email', phone=$phone, Adress='$Adress' WHERE id=$id";
            $result1=$con->query($sql1);

            if(!$result1){
                $errorMessage="Invalid Query:".$con->$error;
                break;
            }

            $successMessage="Client Update correctly";

            header("location:acceuil.php");
            exit;
        }while(false);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud2 affichage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New Client</h2>
        <?php
            if(!empty($errorMessage)){
                echo"
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
        ?>
        <form method="post" class="">
            <input type="hidden" name="id" value="<?php echo $id?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Adress</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Adress" value="<?php echo $Adress?>">
                </div>
            </div>
            <?php
                if(!empty($successMessage)){
                    echo"
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>";
                }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="acceuil.php" class="btn btn-outline-primary" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>

</body>
</html>
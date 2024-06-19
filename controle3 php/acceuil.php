<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>List of Clients</h2>
        <a class="btn btn-primary" href="afficher.php" role="button">New Client</a>
        <br>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Adress</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include("connexion.php");

                // if($con->connect_error){
                // die("Connection Failed:".$con->connect_error);
                // }

                $sql="SELECT * FROM clients";
                $result=$con->query($sql);
                if(!$con){
                    die("Invalid Query:".$con->connect_error);
                }
                
                while($row=$result->fetch()){
                    echo "
                    <tr>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[phone]</td>
                        <td>$row[Adress]</td>
                        <td>$row[created_at]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='modifier.php?id=$row[id]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='supprimer.php?id=$row[id]'>Delete</a>
                        </td>
                    </tr>";
                }
            ?>  
            </tbody>
        </table>
    </div>
</body>
</html>
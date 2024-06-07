
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <div class="container">
        <h1 class="text-success text-center ">Liste des achats</h1>
        
        <form action="" id="productsForm" method="POST">
            <div class="mb-3">
                <label for="code" class="form-label">ID</label>
                <input type="text" class="form-control" name="code" id="code"/>
            </div>
            
            <div class="mb-3">
                <label for="titre" class="form-label">libelle</label>
                <input type="text" class="form-control" name="titre" id="titre"/>
            </div>
        
            <div class="mb-3">
                <label for="prix" class="form-label">Prix</label>
                <input type="number" class="form-control" name="prix" id="prix"/>
            </div>
            <div class="mb-3">
                <label for="qte" class="form-label">Quantite</label>
                <input type="number" class="form-control" name="qte" id="description"/>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" id="sauvegarder">sauvegarder</button>
            </div>
        </form> 
        <a href="postes.php"><button>Mais commandes</button></a>
    </div>
   
   <?php
    require "bd.php";
    $statement = $pdo->prepare('INSERT INTO produit(id,libelle,prix,quantite) VALUES (:id, :libelle, :prix, :quantite)');
    
        $statement->execute([
            ':id'=> $_POST['code'],
            ':libelle' => $_POST['titre'],
            ':prix' =>$_POST['prix'],
            ':quantite'=>$_POST['qte'],
        ]);
        ?>
    
   


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
                <label for="categorie" class="form-label">Catégorie</label>
                <select name="categorie" class="form-select" id="categorie">

                </select>
            </div>
            <div class="mb-3">
                <label for="prix" class="form-label">Prix</label>
                <input type="number" class="form-control" name="prix" id="prix"/>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Quantite</label>
                <input type="text" class="form-control" name="description" id="description"/>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" id="sauvegarder">sauvegarder</button>
            </div>
          
        </form> 
    </div>
    <?php
    require "bd.php";

<?php
  require "bd.php";
  $statement = $pdo -> prepare("SELECT * FROM produit");
  $statement ->execute();
  $results = $statement->fetchALL(PDO::FETCH_ASSOC);
  foreach($results as $item):?>
<body>
  <div class="card">
          <h2 >Mon produit</h2>
            <h4>ID:</h4>
            <h4>libelle:</h4>
            <h4>Prix:</h4>
            <h4>Qte:</h4>
            <h4>prix total :</h4>
          <a href="#" class="card-link">En savoir plus </a>
      </div>            
</body>
<?php endforeach?>





<link rel="stylesheet" href="styleFormulaire.css"/>
<?php
require 'inscreption.php';
$statement = $pdo -> prepare("SELECT * FROM stagiaire");
$statement ->execute();
$results = $statement->fetchALL(PDO::FETCH_ASSOC);

foreach($results as $item):?>
<body>
<div class="stagiaires">
    <p>ID:<?php echo $item["id"]?></p>
    <p>Nom:<?php echo $item["nom"]?></p>
    <p>Prenom:<?php echo $item["prenom"]?></p>
</div>

</body>
<?php endforeach?>
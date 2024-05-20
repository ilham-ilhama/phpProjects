<link rel = "stylesheet" href="style.css"/>
<?php

require("header.html");

?>
<?php
echo 'aaa';
$logged = false ;
if($logged == true){
    echo "you are logged" , "WELCOM!!";
}else{
    echo "Pleasevsign in";
}
?>
<main>
    <div class="div1">
        <?php if($logged == true) : ?>
            <div class="div2">
                welcome dear !!!
            </div>
            <?php else : ?>
                <div class="div3">
                    login in 
                </div>
                <?php endif;  ?>
    </div>
    <div class="div4">
        <?php
     $today = date('N');
     switch ($today ){
        case 1:
            echo "lundi";
            break;
        case 2:
            echo "mardi";
            break;
        case 3:
            echo "mercredi";
            break;
        case 4:
            echo "jeudi";
            break;
        case 5:
            echo "vendredi";
            break;
        case 6:
            echo "samedi";
            break;
        case 7:
            echo "dimench";
            break;
            default :
        }
       
        echo '<br>';


        $etudiants = ["AITSAID", "BADDIOUI", "BOUKRI", "BAKKAROUCHE"];
        for($i = 0 ; $i < count($etudiants) ;$i++){
            echo $etudiants[$i] ."<br>";
        }
        echo '<br>';
        foreach($etudiants as $index => $etudiant){
            echo $etudiant . "|" .$index . "<br>";

        }
     ?>
    </div> 
    <div class="div5">
        <?php
        $posts = [
            ['id' => 1, 'titre' => 'my first post', 'contenu' => 'aaaaaa', 'tags' => 'sport'],
            ['id' => 2, 'titre' => 'my second post', 'contenu' => 'bbbbbb', 'tags' => 'musique'],
            ['id' => 3, 'titre' => 'my third post', 'contenu' => 'kkkkkkkkk', 'tags' => 'theatre'],
        ]
        
        var_dump($posts);
       
        if(isset($_GET['id']))
            $id = $_GET['id'] ?? '';
            $posts = array_filter($post,function($item)){
            return $item['id'] == $_GET['id'];
        }

        
        ?>
    </div>

</main>


<?php

// 1st method

$numbers = [12 , 18 ,40];

// 2nd method 

$stagiaires = array ('ahmed' , 'yassine' , 'ilham'); 
$stagiaires [1] = 'ilham';
echo $stagiaires[1];

// les tableaux associatifs
$numbersTest = [0 => 12, 1 => 34, 2 => 40];
echo $numbersTest[2];

$etudiant = ['nom' => 'ouchouid', 'prenom' => 'zakaria', 'group' => 105 ];
$etudiants = [
    ['nom' => 'ouchouid', 'prenom' => 'zakaria', 'group' => 105 ],
    ['nom' => 'idrisy', 'prenom' => 'aymen', 'group' => 105 ],
    ['nom' => 'baddioui', 'prenom' => 'ilham', 'group' => 105 ]
];

// $etudiants[3] = 'test';
// $etudiants[] = 'test';

array_push($etudiants, ['nom' => 'bakroucha', 'prenom' => 'fatima', 'group' => 106]);

echo '<br>';
echo $etudiant['prenom'];
echo '<br>';
echo '<pre>';
// echo $etudiants[1][ 'prenom'];
var_dump ($etudiants);
echo '<pre>';


require("footer.html");

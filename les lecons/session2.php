<?php

class Utilisateur{

    public static $annee = 2024;                        

    protected $nom;
    protected $prenom;

    public function _construct($nom, $prenom){
        $this ->nom = $nom;
        $this ->prenom = $prenom;
    }
    //Encapsulation
    //Geters
    public function getNom(){
        return $this -> $nom;
    }
    //setters
    public function setNom($nom){
        $this.nom -> $nom;
        }

}

class Etudiant extends Utilisateur{
    public $branche;
    public $groupe;

    public function _construct($nom,$prenom,$branche,$groupe){
        parent::_construct($nom,$prenom);
        $this->branche = $branche;
        $this->groupe = $groupe;
    }


    public function presentez_vous(){
        return parent::presentez_vous(). 'and i am a student';
    }
}

$utilisateur1=new Utilisateur("ouafik","mohamed");
$utilisateur1 ->setNom = ("bakrouche");

$etudiant1 = new Etudiant("aitsaid","kawtar","dd","105");
$etudiant2 = new Etudiant("boukri","ikram","id","104");

// $utilisateur1 = new Utilisateur();
// $utilisateur1 ->nom = "oufik";
// $utilisateur1 ->prenom = "moamed";


$utilisateur2=new Utilisateur("baddioui","ilham");
// $utilisateur2 = new Utilisateur();
// $utilisateur2 ->nom = "baddioui";
// $utilisateur2 ->prenom = "ilham";

echo '<pre>';
var_dump($utilisateur1 ->getNom());

var_dump($utilisateur2);

echo '</pre>';
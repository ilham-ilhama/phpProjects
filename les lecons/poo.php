<?php

class Personne{
    private $nom;
    private $prenom;
    private $age;


    public function __construct($nom,$prenom,$age){
        $this ->nom = $nom;
        $this ->prenom = $prenom;
        $this ->age = $age;
    }
    // //get
    public function __get($property){
        if(property_exists($this,$property)){
            return $this->$property;
        }
        return $this;
    }
    // //setter

    public function __set($property,$value){
        if(property_exists($this,$property)){
            $this->$property = $value;
        }
    }
    
    public function __toString(){
        return 'you called the object'.$this->nom . ' ' .$this->prenom;
    }
    public function __destruct(){
        echo 'destruct ran';
    }

}

$personne1 = new Personne('DIDAT','ILHAM',17);

//personne1 ->__set('nom','ELKHALIDI')
$personne1 ->nom = 'BADDIOUI';


echo $personne1->nom;

//echo $personne1-> __get('nom');
echo '<br>';

echo $personne1;

$personne2 = new Personne('olivia','rodrigo',22);
echo $personne2;


<?php

abstract class Transport {
    protected $idTrans;
    protected $vitesse;
    protected $capacite;

    public function __construct($idTrans, $vitesse, $capacite) {
        $this->idTrans = $idTrans;
        $this->vitesse = $vitesse;
        $this->capacite = $capacite;
    }

    public function infos() {
        echo "ID Transport: $this->idTrans, Vitesse: $this->vitesse km/h, Capacité: $this->capacite places<br>";
    }

    abstract public function montant();
}

class Bateau extends Transport {
    private $marque;
    private $prixTicket;

    public function __construct($idTrans, $vitesse, $capacite, $coleur, $prixTicket) {
        parent::__construct($idTrans, $vitesse, $capacite);
        $this->marque = $coleur;
        $this->prixTicket = $prixTicket;
    }

    public function infos() {
        parent::infos();
        echo "Marque: $this->marque, Prix Ticket: $this->prixTicket EUR<br>";
    }

    public function montant() {
        return $this->capacite * $this->prixTicket;
    }
}



$bateau = new Bateau(6, 30, 70, "blanc", 15);


$bateau->infos();


echo "Montant total si toutes les places sont occupées: " . $bateau->montant() . " EUR<br>";
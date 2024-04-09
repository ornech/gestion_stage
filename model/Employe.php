<?php

class Employe {
    private $conn;
    private $table_name = "Employe";

    public $idEmploye;
    public $idEntreprise;
    public $nom;
    public $prenom;
    public $email;
    public $telephone;
    public $fonction;

    public function __construct($db){
        $this->conn = $db;
    }

    // Méthodes CRUD à implémenter
}
?>

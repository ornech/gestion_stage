<?php

class Etudiant {
    private $conn;
    private $table_name = "Etudiant";

    public $idEtudiant;
    public $nom;
    public $prenom;
    public $email;
    public $telephone;
    public $promo;
    public $login;
    public $password;
    public $password_reset;

    public function __construct($db){
        $this->conn = $db;
    }

    // Méthodes CRUD à implémenter
}
?>

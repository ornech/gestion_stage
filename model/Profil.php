<?php

class Profil {
    private $conn;
    private $table_name = "User";

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
    public function read_profil() {
        $idProfil = $_SESSION['userID'];
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :idProfil";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idProfil', $idProfil, PDO::PARAM_INT);
        $stmt->execute();
        // Retournez directement le résultat au lieu de le stocker dans une variable intermédiaire
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function list_profil(){
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
?>

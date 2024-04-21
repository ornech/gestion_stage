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

    public function reset_password($idProfil){

      //$new_password = sha1();
      $new_password = password_hash("achanger", PASSWORD_DEFAULT);


      // Requête SQL pour mettre à jour la colonne password et password_reset
      $query = "UPDATE " . $this->table_name . " SET password = :password, password_reset = 1 WHERE id = :idProfil";

      // Préparez la requête
      $stmt = $this->conn->prepare($query);
      // Liaison des paramètres
      $stmt->bindParam(":password", $new_password);
      $stmt->bindParam(":idProfil", $idProfil);

      // Exécutez la requête
      if ($stmt->execute()) {
          //return true; // Mise à jour réussie
          return header("Location: router.php?page=gestion_etu");
      } else {
          // Afficher les erreurs SQL en cas d'échec de l'exécution
          echo "Erreur SQL : " . implode(", ", $stmt->errorInfo());
          return false; // Échec de la mise à jour
      }

    }

    public function profil_disable($idProfil){
        $query = "UPDATE " . $this->table_name . " SET inactif=1  WHERE id = :idProfil";
        // Préparez la requête
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":idProfil", $idProfil);

        // Exécutez la requête
        if ($stmt->execute()) {
          return header("Location: router.php?page=gestion_etu"); // Mise à jour réussie

        } else {
            // Afficher les erreurs SQL en cas d'échec de l'exécution
            echo "Erreur SQL : " . implode(", ", $stmt->errorInfo());
            return false; // Échec de la mise à jour
        }
    }

    public function profil_enable($idProfil){
        $query = "UPDATE " . $this->table_name . " SET inactif=0  WHERE id = :idProfil";
        // Préparez la requête
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":idProfil", $idProfil);

        // Exécutez la requête
        if ($stmt->execute()) {
          return header("Location: router.php?page=gestion_etu"); // Mise à jour réussie

        } else {
            // Afficher les erreurs SQL en cas d'échec de l'exécution
            echo "Erreur SQL : " . implode(", ", $stmt->errorInfo());
            return false; // Échec de la mise à jour
        }
    }

}
?>

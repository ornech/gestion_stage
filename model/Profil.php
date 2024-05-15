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
  public $spe;
  public $login;
  public $password;
  public $password_reset;
  public $statut;

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

  public function create_user($nom,$prenom,$email,$telephone,$promo,$spe,$login,$password,$statut){
    $query = "INSERT INTO " . $this->table_name . " SET nom=:nom,
    prenom=:prenom ,
    email=:email ,
    telephone=:telephone ,
    promo=:promo ,
    spe=:spe ,
    login=:login ,
    password=:password ,
    password_reset=0 ,
    statut=:statut ,
    inactif=0";

    $stmt = $this->conn->prepare($query);
    $this->nom=htmlspecialchars(strip_tags($nom));
    $this->prenom=htmlspecialchars(strip_tags($prenom));
    $this->email=htmlspecialchars(strip_tags($email));
    $this->telephone=htmlspecialchars(strip_tags($telephone));
    $this->promo=htmlspecialchars(strip_tags($promo));
    $this->promo=htmlspecialchars(strip_tags($spe));
    $this->login=htmlspecialchars(strip_tags($login));
    $this->password=htmlspecialchars(strip_tags($password));
    $this->statut=htmlspecialchars(strip_tags($statut));

    echo "statut : " . $statut . "<br>";

    $stmt->bindParam(":nom", $this->nom);
    $stmt->bindParam(":prenom", $this->prenom);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":telephone", $this->telephone);
    $stmt->bindParam(":promo", $this->promo);
    $stmt->bindParam(":spe", $this->promo);
    $stmt->bindParam(":login", $this->login);
    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam(":statut", $this->statut);

    if($stmt->execute()){
      //return true;
      return true;
    }
    return false;
  }

  public function reset_password($idProfil){

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

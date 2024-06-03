<?php
class Profil {
  private $conn;
  private $table_name = "user";
  //private $vue_name = "";
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
  public $date_entree;
  public $inactif;

  public function __construct($db){
    $this->conn = $db;
  }

  // Méthodes CRUD à implémenter

  public function list_by_etudiant() {
    $sql = "SELECT * FROM " . $this->table_name . " WHERE statut = 'Etudiant'";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function list_by_classe($classe){
    $sql = "SELECT * FROM " . $this->table_name . " WHERE classe=:classe";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':classe', $classe, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

 public function list_by_professeur() {
    $sql = "SELECT * FROM " . $this->table_name . " WHERE statut = 'Professeur'";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function read_my_profil() {
    $idProfil = $_SESSION['userID'];
    $query = "SELECT * FROM " . $this->table_name . " WHERE id = :idProfil";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':idProfil', $idProfil, PDO::PARAM_INT);
    $stmt->execute();
    // Retournez directement le résultat au lieu de le stocker dans une variable intermédiaire
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  public function read_profil($idProfil) {
    $query = "SELECT * FROM " . $this->table_name . " WHERE id = :idProfil";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':idProfil', $idProfil, PDO::PARAM_INT);
    $stmt->execute();
    // Retournez directement le résultat au lieu de le stocker dans une variable intermédiaire
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  public function list_profil(){
    $query = "SELECT * FROM " . $this->table_name  . " WHERE statut='Professeur' OR (statut='Etudiant' AND date_entree IS NOT NULL) ";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function create_user($nom,$prenom,$email,$telephone,$promo,$spe,$login,$password,$statut,$dateEntree){
    $query = "INSERT INTO " . $this->table_name . " SET nom=:nom,
    prenom=:prenom ,
    email=:email ,
    telephone=:telephone ,
    login=:login ,
    password=:password ,
    password_reset=1 ,
    statut=:statut ,
    inactif=0";

    //Rajoute dans le query spe et promo si le statut n'est pas Professeur
    $query = $statut != "Professeur" ? $query . " , spe=:spe, promo=:promo, date_entree=:date_entree" : $query;

    $stmt = $this->conn->prepare($query);
    $this->nom=htmlspecialchars(strip_tags($nom));
    $this->prenom=htmlspecialchars(strip_tags($prenom));
    $this->email=htmlspecialchars(strip_tags($email));
    $this->telephone=htmlspecialchars(strip_tags($telephone));
    $this->promo=htmlspecialchars(strip_tags($promo));
    $this->spe=htmlspecialchars(strip_tags($spe));
    $this->login=htmlspecialchars(strip_tags($login));
    $this->password=htmlspecialchars(strip_tags($password));
    $this->statut=htmlspecialchars(strip_tags($statut));
    $this->date_entree=htmlspecialchars(strip_tags($dateEntree));

    echo "statut : " . $statut . "<br>";

    $stmt->bindParam(":nom", $this->nom);
    $stmt->bindParam(":prenom", $this->prenom);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":telephone", $this->telephone);
    $stmt->bindParam(":login", $this->login);
    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam(":statut", $this->statut);

    if($statut != "Professeur"){ //Si le statut est professeur, on n'attribut pas de promotion et de spécialité
      $stmt->bindParam(":spe", $this->spe);
      $stmt->bindParam(":promo", $this->promo);
      $stmt->bindParam(":date_entree", $this->date_entree);
    }

    try {
      if($stmt->execute()){
        return true;
      } else {
        throw new Exception("Erreur lors de l'exécution de la requête.");
      }
    } catch (Exception $e) {
      //echo "Erreur : " . $e->getMessage();
      $message = "Erreur SQL : " . implode(", ", $stmt->errorInfo());
      header("Location: ../router.php?page=erreur&message=$message");
      return false;
    }
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

  public function import($nom, $prenom, $spe, $date_entree, $promo, $login, $password, $statut, $inactif, $password_reset) {
    $query = "INSERT INTO " . $this->table_name . "
    SET nom = :nom,
        prenom = :prenom,
        spe = :spe,
        date_entree = :date_entree,
        promo = :promo,
        login = :login,
        password = :password,
        statut = :statut,
        inactif = :inactif,
        password_reset = :password_reset";

    $stmt = $this->conn->prepare($query);

    // Nettoyage des entrées
    $this->nom = htmlspecialchars(strip_tags($nom));
    $this->prenom = htmlspecialchars(strip_tags($prenom));
    $this->promo = htmlspecialchars(strip_tags($promo));
    $this->spe = htmlspecialchars(strip_tags($spe));
    $this->date_entree = htmlspecialchars(strip_tags($date_entree));
    $this->login = htmlspecialchars(strip_tags($login));
    $this->password = htmlspecialchars(strip_tags($password));
    $this->statut = htmlspecialchars(strip_tags($statut));
    $this->inactif = htmlspecialchars(strip_tags($inactif));
    $this->password_reset = htmlspecialchars(strip_tags($password_reset));

    // Paramètres
    $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $stmt->bindParam(':spe', $spe, PDO::PARAM_STR);
    $stmt->bindParam(':date_entree', $date_entree, PDO::PARAM_STR);
    $stmt->bindParam(':promo', $promo, PDO::PARAM_STR);
    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':statut', $statut, PDO::PARAM_STR);
    $stmt->bindParam(':inactif', $inactif, PDO::PARAM_INT);
    $stmt->bindParam(':password_reset', $password_reset, PDO::PARAM_INT);


    try {
        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Erreur lors de l'exécution de la requête.");
        }
    } catch (Exception $e) {
    // Affichage des erreurs SQL
      $errorInfo = $stmt->errorInfo();
      $message = "Erreur SQL : " . $errorInfo[2] . " (SQLSTATE: " . $errorInfo[0] . ", Code: " . $errorInfo[1] . ") lors de l'importation du profil $this->login.";
      header("Location: ../router.php?page=erreur&message=" . urlencode($message));
      return false;
    }
  }

private function debugQuery($query, $params) {
    foreach ($params as $key => $value) {
        $query = str_replace($key, "'" . addslashes($value) . "'", $query);
    }
    return $query;
}

}
?>

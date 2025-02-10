<?php

class Classe
{
  private $conn;
  private $table_name = "classe";
  private $idProfPrincipal;
  private $nomProf;
  private $nomClasse;
  private $promo;
  private $dateDebut;
  private $dateFin;

  private $nbrEtu;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Liste des activités
  public function list()
  {
    $query = "SELECT * FROM " . $this->table_name;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function getClassesNames()
  {
    $query = "SELECT DISTINCT nomClasse FROM " . $this->table_name;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function getByClasseAndPromo($nomClasse, $promo)
  {
    $query = "SELECT * FROM " . $this->table_name . " WHERE nomClasse=:nomClasse AND promo=:promo";
    $stmt = $this->conn->prepare($query);
    $this->nomClasse = htmlspecialchars(strip_tags($nomClasse));
    $this->promo = htmlspecialchars(strip_tags($promo));
    $stmt->bindParam(':nomClasse', $nomClasse);
    $stmt->bindParam(':promo', $promo);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  public function getProfPrincipalByClasseAndPromo($nomClasse, $promo)
  {
    $query = "SELECT idProfPrincipal, nomProf FROM " . $this->table_name . " WHERE nomClasse=:nomClasse AND promo=:promo";
    $stmt = $this->conn->prepare($query);
    $this->nomClasse = htmlspecialchars(strip_tags($nomClasse));
    $this->promo = htmlspecialchars(strip_tags($promo));
    $stmt->bindParam(':nomClasse', $nomClasse);
    $stmt->bindParam(':promo', $promo);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  public function getStageByClasseAndPromo($nomClasse, $promo){
    $query = "SELECT dateDebut, dateFin FROM " . $this->table_name . " WHERE nomClasse=:nomClasse AND promo=:promo";
    $stmt = $this->conn->prepare($query);
    $this->nomClasse = htmlspecialchars(strip_tags($nomClasse));
    $this->promo = htmlspecialchars(strip_tags($promo));
    $stmt->bindParam(':nomClasse', $nomClasse);
    $stmt->bindParam(':promo', $promo);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  public function updateProfPrincipal($nomClasse, $promo, $idProfPrincipal, $nomProf){
    try{
      $query = "UPDATE " . $this->table_name . " SET idProfPrincipal=:idProfPrincipal, nomProf=:nomProf WHERE nomClasse=:nomClasse AND promo=:promo";
      $stmt = $this->conn->prepare($query);
      $this->nomClasse = htmlspecialchars(strip_tags($nomClasse));
      $this->promo = htmlspecialchars(strip_tags($promo));
      $this->idProfPrincipal = htmlspecialchars(strip_tags($idProfPrincipal));
      $this->nomProf = htmlspecialchars(strip_tags($nomProf));
      $stmt->bindParam(':nomClasse', $nomClasse);
      $stmt->bindParam(':promo', $promo);
      $stmt->bindParam(':idProfPrincipal', $idProfPrincipal);
      $stmt->bindParam(':nomProf', $nomProf);

      if($stmt->execute()){
        return true;
      }else{
        return false;
      }
    }catch(Exception $e){
      header("Location: /router.php?page=erreur&titre=Erreur&message=Une erreur est survenue lors de la mise à jour du professeur principal de la classe...");
      exit();
    }
  }

  public function updateStageByClasseAndPromo($nomClasse, $promo, $dateDebut, $dateFin){
    try{
      $query = "UPDATE " . $this->table_name . " SET dateDebut=:dateDebut, dateFin=:dateFin WHERE nomClasse=:nomClasse AND promo=:promo";
      $stmt = $this->conn->prepare($query);
      $this->nomClasse = htmlspecialchars(strip_tags($nomClasse));
      $this->promo = htmlspecialchars(strip_tags($promo));
      $this->dateDebut = htmlspecialchars(strip_tags($dateDebut));
      $this->dateFin = htmlspecialchars(strip_tags($dateFin));
      $stmt->bindParam(':nomClasse', $nomClasse);
      $stmt->bindParam(':promo', $promo);
      $stmt->bindParam(':dateDebut', $dateDebut);
      $stmt->bindParam(':dateFin', $dateFin);

      if($stmt->execute()){
        return true;
      }else{
        return false;
      }
    }catch(Exception $e){
      header("Location: /router.php?page=erreur&titre=Erreur&message=Une erreur est survenue lors de la création des dates de stage...");
      exit();
    }
  }

  public function updateNbrEtu($nbrEtu, $nomClasse, $promo){
    try{
      $query = "UPDATE " . $this->table_name . " SET nbrEtu=:nbrEtu WHERE nomClasse=:nomClasse AND promo=:promo";
      $stmt = $this->conn->prepare($query);
      $this->nomClasse = htmlspecialchars(strip_tags($nomClasse));
      $this->promo = htmlspecialchars(strip_tags($promo));
      $this->nbrEtu = htmlspecialchars(strip_tags($nbrEtu));
      $stmt->bindParam(':nomClasse', $nomClasse);
      $stmt->bindParam(':promo', $promo);
      $stmt->bindParam(':nbrEtu', $nbrEtu);

      if($stmt->execute()){
        return true;
      }else{
        return false;
      }
    }catch(Exception $e){
      header("Location: /router.php?page=erreur&titre=Erreur&message=Une erreur est survenue lors de la mise à jour du nombre d'étudiants de la classe...");
      exit();
    }
  }

  public function updateNbrSpe($nbrSpe, $spe, $nomClasse, $promo)
  {
    try {
      $query = "UPDATE " . $this->table_name . " SET " . $spe ."=:nbrEtu WHERE nomClasse=:nomClasse AND promo=:promo";
      $stmt = $this->conn->prepare($query);
      $this->nomClasse = htmlspecialchars(strip_tags($nomClasse));
      $this->promo = htmlspecialchars(strip_tags($promo));
      $this->nbrEtu = htmlspecialchars(strip_tags($nbrSpe));
      $stmt->bindParam(':nomClasse', $nomClasse);
      $stmt->bindParam(':promo', $promo);
      $stmt->bindParam(':nbrEtu', $nbrSpe);

      if ($stmt->execute()) {
        return true;
      } else {
        return false;
      }
    } catch (Exception $e) {
      header("Location: /router.php?page=erreur&titre=Erreur&message=Une erreur est survenue lors de la mise à jour du nombre d'étudiants de la classe...");
      exit();
    }
  }

  public function create($nomClasse, $promo){
    try{
      $query = "INSERT INTO " . $this->table_name . " SET nomClasse=:nomClasse, promo=:promo";
      $stmt = $this->conn->prepare($query);
      $this->nomClasse = htmlspecialchars(strip_tags($nomClasse));
      $this->promo = htmlspecialchars(strip_tags($promo));
      $stmt->bindParam(':nomClasse', $nomClasse);
      $stmt->bindParam(':promo', $promo);

      if($stmt->execute()){
        return true;
      }else{
        return false;
      }
    }catch(Exception $e){
      header("Location: /router.php?page=erreur&titre=Erreur&message=Une erreur est survenue lors de la création de la classe...");
      exit();
    }
  }

}
?>
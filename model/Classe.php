<?php

class Classe
{
  private $conn;
  private $table_name = "classe";
  private $idProfPrincipal;
  private $nomProf;
  private $nomClasse;
  private $dateDebutStage;
  private $dateFinStage;

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

  public function getById($id)
  {
    $query = "SELECT * FROM " . $this->table_name . " WHERE id=:id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  public function getClasseName($id){
    $query = "SELECT nomClasse FROM " . $this->table_name . " WHERE id=:id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  public function getClasseId($nomClasse){
    $query = "SELECT id FROM " . $this->table_name . " WHERE nomClasse=:nomClasse";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':nomClasse', $nomClasse);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  public function getProfPrincipalByClasseName($nomClasse){
    $query = "SELECT idProfPrincipal, nomProf FROM " . $this->table_name . " WHERE nomClasse=:nomClasse";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':nomClasse', $nomClasse);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  public function getProfPrincipalByClasseId($id){
    $query = "SELECT idProfPrincipal, nomProf FROM " . $this->table_name . " WHERE id=:id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  public function isProfPrincipal($idUser){
    $query = "SELECT id FROM " . $this->table_name . " WHERE idProfPrincipal=:idProfPrincipal";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':idProfPrincipal', $idUser);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  public function updateProfPrincipal($idClasse, $idProfPrincipal, $nomProf){
    try{
      $query = "UPDATE " . $this->table_name . " SET idProfPrincipal=:idProfPrincipal, nomProf=:nomProf WHERE id=:id";
      $stmt = $this->conn->prepare($query);
      $this->idProfPrincipal = htmlspecialchars(strip_tags($idProfPrincipal));
      $this->nomProf = htmlspecialchars(strip_tags($nomProf));
      $stmt->bindParam(':idProfPrincipal', $idProfPrincipal);
      $stmt->bindParam(':id', $idClasse);
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
}
?>
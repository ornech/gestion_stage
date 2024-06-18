<?php

class Stage_Dates
{
  private $conn;
  private $table_name = "stage_dates";
  private $classe;
  private $promo;
  private $dateDebut;
  private $dateFin;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Liste des activités
  public function list(){
    $query = "SELECT * FROM " . $this->table_name;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function create($classe, $promo, $dateDebut, $dateFin){
    $query = "INSERT INTO " . $this->table_name . " (classe, promo, dateDebut, dateFin) VALUES (:classe, :promo, :dateDebut, :dateFin)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':classe', $classe);
    $stmt->bindParam(':promo', $promo);
    $stmt->bindParam(':dateDebut', $dateDebut);
    $stmt->bindParam(':dateFin', $dateFin);
    return $stmt->execute();
  }

  public function getById($id){
    $query = "SELECT * FROM " . $this->table_name . " WHERE id=:id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  public function getStageByClasseAndPromo($classe, $promo){
    $query = "SELECT * FROM " . $this->table_name . " WHERE classe=:classe AND promo=:promo;";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':classe', $classe);
    $stmt->bindParam(':promo', $promo);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  public function updateStageByClasseAndPromo($classe, $promo, $dateDebut, $dateFin){
    $query = "UPDATE " . $this->table_name . " SET dateDebut=:dateDebut, dateFin=:dateFin WHERE classe=:classe AND promo=:promo;";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':classe', $classe);
    $stmt->bindParam(':promo', $promo);
    $stmt->bindParam(':dateDebut', $dateDebut);
    $stmt->bindParam(':dateFin', $dateFin);
    return $stmt->execute();
  }

}
?>
<?php

class Operations {
  private $conn;
  private $vue_name = "vue_operations";

  public function __construct($db){
    $this->conn = $db;
  }

  // Liste des activités
  public function list(){
    $query = "SELECT * FROM ". $this->vue_name . " ORDER BY dateCreation DESC"; // " . $this->table_name;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function list_from_tuteur($idTuteur){
    $query = "SELECT * FROM ". $this->vue_name . " WHERE idTuteur=:idTuteur ORDER BY dateCreation DESC"; // " . $this->table_name;
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':idTuteur', $idTuteur, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

}
?>

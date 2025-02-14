<?php
class Journal {
  private $conn;
  private $table_name = "journaux";
  private $vue_name = "vue_journaux";

  private $id;
  private $idEtu;
  private $idStageEtu;
  private $competences;
  private $semaine;
  private $titre;
private $description;

  public function __construct($db){
    $this->conn = $db;
  }

  //Création d'une réalisation
  public function createRealisation($idEtu, $idStageEtu, $competences, $titre, $description){
    $query = "INSERT INTO ". $this->table_name . " (idEtu, idStageEtu, competences, titre, description) VALUES (:idEtu, :idStageEtu, :competences, :titre, :description)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':idEtu', $idEtu, PDO::PARAM_INT);
    $stmt->bindParam(':idStageEtu', $idStageEtu, PDO::PARAM_INT);
    $stmt->bindParam(':competences', $competences, PDO::PARAM_STR);
    $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    
    try{
        if($stmt->execute()){
            return true;
        }else{
            throw new Exception("Erreur lors de l'exécution de la requête.");
        }
    } catch (Exception $e) {
        $message = "Erreur lors de la création d'une réalisation : " . implode(", ", $stmt->errorInfo());
        header("Location: ../router.php?page=erreur&message=$message");
        return false;
    }
  }

  public function deleteRealisation($id){
    $query = "DELETE FROM ". $this->table_name . " WHERE id=:id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    try{
        if($stmt->execute()){
            return true;
        }else{
            throw new Exception("Erreur lors de l'exécution de la requête.");
        }
    } catch (Exception $e) {
        $message = "Erreur lors de la suppression d'une réalisation : " . implode(", ", $stmt->errorInfo());
        header("Location: ../router.php?page=erreur&message=$message");
        return false;
    }
  }

}
?>

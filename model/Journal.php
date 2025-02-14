<?php
class Journal {
  private $conn;
  private $table_name = "journaux";

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

    $this->idEtu = htmlspecialchars($idEtu);
    $this->idStageEtu = htmlspecialchars($idStageEtu);
    $this->competences = htmlspecialchars($competences);
    $this->titre = htmlspecialchars($titre);
    $this->description = htmlspecialchars($description);

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
    $this->id = htmlspecialchars($id);
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

  public function getRealisationsPerSemaineByStage($idStage, $nbSemaine){
    $query = "SELECT * FROM ". $this->table_name . " WHERE idStageEtu=:idStageEtu";
    $stmt = $this->conn->prepare($query);

    $this->idStageEtu = htmlspecialchars($idStage);
    $stmt->bindParam(':idStageEtu', $this->idStageEtu, PDO::PARAM_INT);
    $stmt->execute();
    $realisations = $stmt->fetchAll(PDO::FETCH_OBJ);
    
    $result = [];
    // On entre le nombre de semaines dans le tableau
    for ($i = 1; $i <= $nbSemaine; $i++) {
        $result[$i] = [];
    }

    // On remplit le tableau avec les réalisations
    foreach($realisations as $realisation){
        $result[$realisation->semaine][] = $realisation;
    }
    return $result;
  }

}
?>

<?php

class Stage {
    private $conn;
    private $table_name = "vue_stage";

    public function __construct($db){
      $this->conn = $db;
    }

    // Strucuture table STAGE
    // id|idEntreprise|idMaitreDeStage|idEtudiant|titreStage|description|dateDebut|dateFin|

    public function list(){
      $query = "SELECT * FROM " . $this->table_name;
      $stmt = $this->conn->prepare($query);

      try {
          if($stmt->execute()){
              return $stmt->fetchAll(PDO::FETCH_OBJ);
          } else {
              throw new Exception("Erreur lors de l'exécution de la requête.");
          }
      } catch (Exception $e) {
          //echo "Erreur : " . $e->getMessage();
          $message = "SQL : " . implode(", ", $stmt->errorInfo());
          header("Location: ../router.php?page=erreur&title=Erreur&message=$message");
          return false;
      }
    }

    public function read($idEtudiant){
      $query = "SELECT * FROM " . $this->table_name . "WHERE EntrepriseID =:idEtudiant";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':idEtudiant', $idEtudiant, PDO::PARAM_INT);


      try {
          if($stmt->execute()){
              return $stmt->fetchAll(PDO::FETCH_OBJ);
          } else {
              throw new Exception("Erreur lors de l'exécution de la requête.");
          }
      } catch (Exception $e) {
          //echo "Erreur : " . $e->getMessage();
          $message = "SQL : " . implode(", ", $stmt->errorInfo());
          header("Location: ../router.php?page=erreur&title=Erreur&message=$message");
          return false;
      }
    }
}
?>

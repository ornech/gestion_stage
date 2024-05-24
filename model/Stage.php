<?php

class Stage {
    private $conn;
    private $table_name = "stage";
    private $vue_name = "vue_stage";
    public $idEntreprise;
    public $idMaitreDeStage;
    public $idEtudiant;
    public $titreStage;
    public $description;
    public $dateDebut;
    public $dateFin;


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

    public function create_stage($idEntreprise,$idMaitreDeStage,$idEtudiant,$titreStage,$description,$dateDebut,$dateFin){
      $query = "INSERT INTO " . $this->table_name . " SET idEntreprise=:idEntreprise ,
      idMaitreDeStage=:idMaitreDeStage ,
      idEtudiant=:idEtudiant ,
      titreStage=:titreStage ,
      description=:description ,
      dateDebut=:dateDebut ,
      dateFin=:dateFin";
  
      $stmt = $this->conn->prepare($query);
      $this->idEntreprise=htmlspecialchars(strip_tags($idEntreprise));
      $this->idMaitreDeStage=htmlspecialchars(strip_tags($idMaitreDeStage));
      $this->idEtudiant=htmlspecialchars(strip_tags($idEtudiant));
      $this->titreStage=htmlspecialchars(strip_tags($titreStage));
      $this->description=htmlspecialchars(strip_tags($description));
      $this->dateDebut=htmlspecialchars(strip_tags($dateDebut));
      $this->dateFin=htmlspecialchars(strip_tags($dateFin));
  
      $stmt->bindParam(":idEntreprise", $this->idEntreprise);
      $stmt->bindParam(":idMaitreDeStage", $this->idMaitreDeStage);
      $stmt->bindParam(":idEtudiant", $this->idEtudiant);
      $stmt->bindParam(":titreStage", $this->titreStage);
      $stmt->bindParam(":description", $this->description);
      $stmt->bindParam(":dateDebut", $this->dateDebut);
      $stmt->bindParam(":dateFin", $this->dateFin);
  
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
  

    public function readFromEntrepriseId($idEntreprise){
      $query = "SELECT * FROM " . $this->vue_name . "WHERE idEntreprise =:idEntreprise";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':idEntreprise', $idEntreprise, PDO::PARAM_INT);


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

    public function readFromEtudiantId($idEtudiant){
      $query = "SELECT * FROM " . $this->vue_name . "WHERE idEtudiant =:idEtudiant";
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

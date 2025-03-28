<?php

class Stage {
    private $conn;
    private $table_name = "stage";
    private $vue_name = "vue_stage";
    private $anomymousId = -1;
    public $idEntreprise;
    public $idMaitreDeStage;
    public $idEtudiant;
    public $classe;
    public $titreStage;
    public $description;
    public $dateDebut;
    public $duree;


    public function __construct($db){
      $this->conn = $db;
    }
    // Strucuture table STAGE
    // id|idEntreprise|idMaitreDeStage|idEtudiant|titreStage|description|dateDebut|dateFin|

  public function list_by_entreprise($idEntreprise) {
    $sql = "SELECT * FROM " . $this->vue_name . " WHERE idEntreprise = :idEntreprise ORDER BY dateDebut DESC";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':idEntreprise', $idEntreprise);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function count_by_entreprise($idEntreprise) {
    $sql = "SELECT COUNT(*) AS nbr FROM " . $this->vue_name . " WHERE idEntreprise = :idEntreprise ORDER BY dateDebut DESC";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':idEntreprise', $idEntreprise);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function stage_by_id($idStage) {
    $sql = "SELECT * FROM " . $this->vue_name . " WHERE idStage = :idStage ORDER BY dateDebut DESC";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':idStage', $idStage);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);

  }


  public function list(){
    $query = "SELECT * FROM " . $this->vue_name . " ORDER BY dateDebut DESC";
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

  public function list_by_classe($classe){
    $query = "SELECT * FROM " . $this->vue_name . " WHERE classe=:classe ORDER BY dateDebut DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":classe", $classe);

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
  public function create_mystage($idEntreprise,$idMaitreDeStage,$idEtudiant,$classe,$dateDebut,$duree){
    $query = "INSERT INTO " . $this->table_name . " SET idEtudiant=:idEtudiant ,
    idMaitreDeStage=:idMaitreDeStage ,
    idEntreprise=:idEntreprise ,
    classe=:classe ,
    dateDebut=:dateDebut ,
    dateFin=DATE_ADD(:dateDebut, INTERVAL :duree WEEK)";

    $stmt = $this->conn->prepare($query);
    $this->idEntreprise=htmlspecialchars(strip_tags($idEntreprise));
    $this->idMaitreDeStage=htmlspecialchars(strip_tags($idMaitreDeStage));
    $this->idEtudiant=htmlspecialchars(strip_tags($idEtudiant));
    $this->classe=htmlspecialchars(strip_tags($classe));
    $this->dateDebut=htmlspecialchars(strip_tags($dateDebut));
    $this->duree=htmlspecialchars(strip_tags($duree));

    $stmt->bindParam(":idEntreprise", $this->idEntreprise);
    $stmt->bindParam(":idMaitreDeStage", $this->idMaitreDeStage);
    $stmt->bindParam(":idEtudiant", $this->idEtudiant);
    $stmt->bindParam(":classe", $this->classe);
    $stmt->bindParam(":dateDebut", $this->dateDebut);
    $stmt->bindParam(":duree", $this->duree);

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
  public function create_stage($idEntreprise,$idMaitreDeStage,$idEtudiant,$classe,$dateDebut,$duree){
    $query = "INSERT INTO " . $this->table_name . " SET idEntreprise=:idEntreprise ,
    idMaitreDeStage=:idMaitreDeStage ,
    idEtudiant=:idEtudiant ,
    classe=:classe ,
    dateDebut=:dateDebut ,
    dateFin=DATE_ADD(:dateDebut, INTERVAL :duree WEEK)";

    $stmt = $this->conn->prepare($query);
    $this->idEntreprise=htmlspecialchars(strip_tags($idEntreprise));
    $this->idMaitreDeStage=htmlspecialchars(strip_tags($idMaitreDeStage));
    $this->idEtudiant=htmlspecialchars(strip_tags($idEtudiant));
    $this->classe=htmlspecialchars(strip_tags($classe));
    $this->dateDebut=htmlspecialchars(strip_tags($dateDebut));
    $this->duree=htmlspecialchars(strip_tags($duree));

    $stmt->bindParam(":idEntreprise", $this->idEntreprise);
    $stmt->bindParam(":idMaitreDeStage", $this->idMaitreDeStage);
    $stmt->bindParam(":idEtudiant", $this->idEtudiant);
    $stmt->bindParam(":classe", $this->classe);
    $stmt->bindParam(":dateDebut", $this->dateDebut);
    $stmt->bindParam(":duree", $this->duree);

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

  public function edit_stage($idStage, $idEntreprise, $idMaitreDeStage, $dateDebut, $duree){
    $query = "UPDATE " . $this->table_name . " SET idEntreprise=:idEntreprise ,
    idMaitreDeStage=:idMaitreDeStage ,
    dateDebut=:dateDebut ,
    dateFin=DATE_ADD(:dateDebut, INTERVAL :duree WEEK)
    WHERE id=:idStage";

    $stmt = $this->conn->prepare($query);
    $this->idEntreprise=htmlspecialchars(strip_tags($idEntreprise));
    $this->idMaitreDeStage=htmlspecialchars(strip_tags($idMaitreDeStage));
    $this->dateDebut=htmlspecialchars(strip_tags($dateDebut));
    $this->duree=htmlspecialchars(strip_tags($duree));

    $stmt->bindParam(":idEntreprise", $this->idEntreprise);
    $stmt->bindParam(":idMaitreDeStage", $this->idMaitreDeStage);
    $stmt->bindParam(":dateDebut", $this->dateDebut);
    $stmt->bindParam(":duree", $this->duree);
    $stmt->bindParam(":idStage", $idStage);

    try {
      if($stmt->execute()){
        return true;
      } else {
        throw new Exception("Erreur lors de l'exécution de la requête.");
      }
    } catch (Exception $e) {
      echo "Erreur : " . $e->getMessage();
      $message = "Erreur SQL : " . implode(", ", $stmt->errorInfo());
      //header("Location: ../router.php?page=erreur&message=$message");
      return false;
    }
  }

  public function readFromEntrepriseId($idEntreprise){
    $query = "SELECT * FROM " . $this->vue_name . "WHERE idEntreprise =:idEntreprise ORDER BY dateDebut DESC";
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
    $query = "SELECT * FROM " . $this->vue_name . " WHERE idEtudiant = :idEtudiant ORDER BY dateDebut DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':idEtudiant', $idEtudiant, PDO::PARAM_INT);

    try {
        if($stmt->execute()){
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            throw new Exception("Erreur lors de l'exécution de la requête.");
        }
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
        $message = "SQL : " . implode(", ", $stmt->errorInfo());
        //header("Location: ../router.php?page=erreur&title=Erreur&message=$message");
        return false;
    }
  }

  public function assignation_suivi($idStage, $idProfesseur){

    $query = "UPDATE " . $this->table_name . " SET idProfesseur = :idProfesseur WHERE id = :idStage";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':idStage', $idStage, PDO::PARAM_INT);
    $stmt->bindParam(':idProfesseur', $idProfesseur, PDO::PARAM_INT);

    try {
        if($stmt->execute()){
            return true;
        } else {
            throw new Exception("Erreur lors de l'exécution de la requête.");
        }
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
        $message = "SQL : " . implode(", ", $stmt->errorInfo());
        header("Location: ../router.php?page=erreur&title=Erreur&message=$message");
        return false;
    }

  }

  public function anonymizeIdEtudiant($userId){
    $query = "UPDATE " . $this->table_name . " SET idEtudiant = " . $this->anomymousId . " WHERE idEtudiant = :idEtudiant";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':idEtudiant', $userId, PDO::PARAM_INT);
    try {
      if($stmt->execute()){
          return true;
      } else {
          throw new Exception("Erreur lors de l'exécution de la requête.");
      }
    } catch (Exception $e) {
        //echo "Erreur : " . $e->getMessage();
        $message = "Erreur SQL : " . implode(", ", $stmt->errorInfo());
        header("Location: ../router.php?page=erreur&title=Anonymisation stage&message=$message");
        return false;
    }
  }
}

?>

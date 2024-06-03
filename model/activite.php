<?php

class Activite {
  private $conn;
  private $table_name = "logs";
  private $vue_name = "vue_logs";
  public $idActiviteType;
  public $idUser;
  public $entite_type;
  public $entite_id;
  public $old_values;
  public $new_values;

  public function __construct($db){
    $this->conn = $db;
  }

  // Créer une nouvelle activité
  public function create($idActiviteType, $idUser, $entite_type, $entite_id, $old_values, $new_values){
    $query = "INSERT INTO ". $this->table_name . " SET idLogType=:idLogType, 
    idUser=:idUser, 
    entite_type=:entite_type, 
    entite_id=:entite_id, 
    old_values=:old_values, 
    new_values=:new_values, 
    date=NOW()";

    $this->idActiviteType=htmlspecialchars(strip_tags($idActiviteType));
    $this->idUser=htmlspecialchars(strip_tags($idUser));
    $this->entite_type=htmlspecialchars(strip_tags($entite_type));
    $this->entite_id=htmlspecialchars(strip_tags($entite_id));

    
    $this->old_values=$old_values;
    $this->new_values=$new_values;

    var_dump($this->new_values);

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':idLogType', $this->idActiviteType);
    $stmt->bindParam(':idUser', $this->idUser);
    $stmt->bindParam(':entite_type', $this->entite_type);
    $stmt->bindParam(':entite_id', $this->entite_id);
    $stmt->bindParam(':old_values', $this->old_values);
    $stmt->bindParam(':new_values', $this->new_values);

    try {
      if($stmt->execute()){
        return true;
      } else {
        throw new Exception("Erreur lors de l'exécution de la requête.");
      }
    } catch (Exception $e) {
      echo "Erreur : " . $e->getMessage();
      $message = "Erreur SQL : " . implode(", ", $stmt->errorInfo());
      header("Location: ../router.php?page=erreur&message=$message");
      return false;
    }

  }

  // Liste des activités
  public function liste_activites(){
    $query = "SELECT * FROM ". $this->vue_name . " "; // " . $this->table_name;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  // Détails d'une activité pour un étudiant donné
  public function detail_activite_etu() {

    return ;
  }
}

?>

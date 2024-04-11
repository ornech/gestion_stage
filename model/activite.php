<?php

class Activite {
    private $conn;
    private $table_name = "Activite_Etu";

    public $date;
    public $ID_Entreprise;
    public $type;
    public $Commentaire;
    public $IdEtudiant;

    public function __construct($db){
        $this->conn = $db;
    }

    // Créer une nouvelle activité
    public function create(){
        $query = "INSERT INTO " . $this->table_name . "
                SET ID_Entreprise=:ID_Entreprise, date=NOW(), type=:type,
                    Commentaire=:Commentaire, IdEtudiant=:IdEtudiant";

        $stmt = $this->conn->prepare($query);
        $this->ID_Entreprise=htmlspecialchars(strip_tags($this->ID_Entreprise));
        $this->type=htmlspecialchars(strip_tags($this->type));
        $this->Commentaire=htmlspecialchars(strip_tags($this->Commentaire));
        $this->IdEtudiant=htmlspecialchars(strip_tags($this->IdEtudiant));

        $stmt->bindParam(":ID_Entreprise", $this->ID_Entreprise);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":Commentaire", $this->Commentaire);
        $stmt->bindParam(":IdEtudiant", $this->IdEtudiant);

        // Affichage de la requête SQL avec les valeurs liées
        $boundParams = array(
          ':ID_Entreprise' => $this->ID_Entreprise,
          ':type' => $this->type,
          ':Commentaire' => $this->Commentaire,
          ':IdEtudiant' => $this->IdEtudiant
        );
        $finalQuery = strtr($query, $boundParams);
        echo "Requête SQL finale : " . $finalQuery . "<br>";

        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // Liste des activités
    public function liste_activites(){
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function activite_prof(){
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function createActivite($ID_Entreprise, $type, $Commentaire, $IdEtudiant) {
            $query = "INSERT INTO Activite_Etu (ID_Entreprise, date, type, Commentaire, IdEtudiant)
                      VALUES (:ID_Entreprise, NOW(), :type, :Commentaire, :IdEtudiant)";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':ID_Entreprise', $ID_Entreprise);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':Commentaire', $Commentaire);
            $stmt->bindParam(':IdEtudiant', $IdEtudiant);

            return $stmt->execute();
        }

    // Détails d'une activité pour un étudiant donné
    public function detail_activite_etu($IdEtudiant) {

        return ;
    }
}

?>

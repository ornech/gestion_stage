<?php

class Entreprise {
    private $conn;
    private $table_name = "Entreprise";

    public $idEntreprise;
    public $nomEntreprise;
    public $adresse;
    public $ville;
    public $tel;
    public $codePostal;
    public $indice_fiabilite;

    public function __construct($db){
        $this->conn = $db;
    }

    // Créer une nouvelle entreprise
    public function create(){
        $query = "INSERT INTO " . $this->table_name . "
                SET nomEntreprise=:nomEntreprise, adresse=:adresse, ville=:ville,
                    tel=:tel, codePostal=:codePostal, indice_fiabilite=:indice_fiabilite";

        $stmt = $this->conn->prepare($query);

        $this->nomEntreprise=htmlspecialchars(strip_tags($this->nomEntreprise));
        $this->adresse=htmlspecialchars(strip_tags($this->adresse));
        $this->ville=htmlspecialchars(strip_tags($this->ville));
        $this->tel=htmlspecialchars(strip_tags($this->tel));
        $this->codePostal=htmlspecialchars(strip_tags($this->codePostal));
        $this->indice_fiabilite=htmlspecialchars(strip_tags($this->indice_fiabilite));

        $stmt->bindParam(":nomEntreprise", $this->nomEntreprise);
        $stmt->bindParam(":adresse", $this->adresse);
        $stmt->bindParam(":ville", $this->ville);
        $stmt->bindParam(":tel", $this->tel);
        $stmt->bindParam(":codePostal", $this->codePostal);
        $stmt->bindParam(":indice_fiabilite", $this->indice_fiabilite);

        if($stmt->execute()){
            return true;
        }
        return false;
    }


    // Liste des entreprises
    public function read(){
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function read_fiche($idEntreprise) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :idEntreprise";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idEntreprise', $idEntreprise, PDO::PARAM_INT);
        $stmt->execute();
        // Retournez directement le résultat au lieu de le stocker dans une variable intermédiaire
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Modèle Entreprise
    public function update($id, $nouvelles_infos) {
        // Préparez la requête SQL pour mettre à jour les informations de l'entreprise
        $query = "UPDATE " . $this->table_name . " SET nomEntreprise = :nom, adresse = :adresse, ville = :ville, tel = :tel, codePostal = :codePostal WHERE id = :id";
        // Préparez la requête
        $stmt = $this->conn->prepare($query);

        // Assurez-vous que les variables de classe contiennent les valeurs correctes
        $this->nomEntreprise = htmlspecialchars(strip_tags($nouvelles_infos['nom']));
        $this->adresse = htmlspecialchars(strip_tags($nouvelles_infos['adresse']));
        $this->ville = htmlspecialchars(strip_tags($nouvelles_infos['ville']));
        $this->tel = htmlspecialchars(strip_tags($nouvelles_infos['tel']));
        $this->codePostal = htmlspecialchars(strip_tags($nouvelles_infos['codePostal']));
        //$this->indice_fiabilite = htmlspecialchars(strip_tags($nouvelles_infos['indice_fiabilite']));

        // Liaison des paramètres
        $stmt->bindParam(":nom", $this->nomEntreprise);
        $stmt->bindParam(":adresse", $this->adresse);
        $stmt->bindParam(":ville", $this->ville);
        $stmt->bindParam(":tel", $this->tel);
        $stmt->bindParam(":codePostal", $this->codePostal);
        //$stmt->bindParam(":indice_fiabilite", $this->indice_fiabilite);
        $stmt->bindParam(":id", $id);

        // Exécutez la requête
        if ($stmt->execute()) {
            return true; // Mise à jour réussie
        } else {
            // Afficher les erreurs SQL en cas d'échec de l'exécution
            echo "Erreur SQL : " . implode(", ", $stmt->errorInfo());
            return false; // Échec de la mise à jour
        }
    }


    // Supprimer une entreprise
    public function delete(){
        $query = "DELETE FROM " . $this->table_name . " WHERE idEntreprise = ?";
        $stmt = $this->conn->prepare($query);
        $this->idEntreprise=htmlspecialchars(strip_tags($this->idEntreprise));
        $stmt->bindParam(1, $this->idEntreprise);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
}
?>

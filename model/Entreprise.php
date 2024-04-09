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


    // Lire les entreprises
    public function read(){
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Mettre à jour une entreprise
    public function update(){
        $query = "UPDATE " . $this->table_name . "
                SET nomEntreprise=:nomEntreprise, adresse=:adresse, ville=:ville,
                    tel=:tel, codePostal=:codePostal, indice_fiabilite=:indice_fiabilite
                WHERE idEntreprise = :idEntreprise";

        $stmt = $this->conn->prepare($query);

        $this->nomEntreprise=htmlspecialchars(strip_tags($this->nomEntreprise));
        $this->adresse=htmlspecialchars(strip_tags($this->adresse));
        $this->ville=htmlspecialchars(strip_tags($this->ville));
        $this->tel=htmlspecialchars(strip_tags($this->tel));
        $this->codePostal=htmlspecialchars(strip_tags($this->codePostal));
        $this->indice_fiabilite=htmlspecialchars(strip_tags($this->indice_fiabilite));
        $this->idEntreprise=htmlspecialchars(strip_tags($this->idEntreprise));

        $stmt->bindParam(":nomEntreprise", $this->nomEntreprise);
        $stmt->bindParam(":adresse", $this->adresse);
        $stmt->bindParam(":ville", $this->ville);
        $stmt->bindParam(":tel", $this->tel);
        $stmt->bindParam(":codePostal", $this->codePostal);
        $stmt->bindParam(":indice_fiabilite", $this->indice_fiabilite);
        $stmt->bindParam(":idEntreprise", $this->idEntreprise);

        if($stmt->execute()){
            return true;
        }
        return false;
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

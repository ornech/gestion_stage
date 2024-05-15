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
    public function importer($entrepriseData){
        $query = "INSERT INTO " . $this->table_name . " SET
        nomEntreprise=:nomEntreprise,
        adresse=:adresse,
        adresse2=:adresse2,
        ville=:ville,
        codePostal=:codePostal,
        tel=:tel,
        dep_geo=:dep_geo,
        siret=:siret,
        naf=:naf,
        type=:type,
        effectif=:effectif,
        Created_UserID=:Created_UserID,
        Created_Date=:Created_Date
        ";

        $stmt = $this->conn->prepare($query);

        // Nettoyage et assignation des valeurs
        $this->nomEntreprise=htmlspecialchars(strip_tags($entrepriseData['nomEntreprise']));
        $this->adresse=htmlspecialchars(strip_tags($entrepriseData['adresse']));
        $this->adresse2=htmlspecialchars(strip_tags($entrepriseData['adresse2']));
        $this->ville=htmlspecialchars(strip_tags($entrepriseData['ville']));
        $this->codePostal=htmlspecialchars(strip_tags($entrepriseData['codePostal']));
        $this->tel=htmlspecialchars(strip_tags($entrepriseData['tel']));
        $this->dep_geo=htmlspecialchars(strip_tags($entrepriseData['dep_geo']));
        $this->siret=htmlspecialchars(strip_tags($entrepriseData['siret']));
        $this->naf=htmlspecialchars(strip_tags($entrepriseData['naf']));
        $this->type=htmlspecialchars(strip_tags($entrepriseData['type']));
        $this->effectif=htmlspecialchars(strip_tags($entrepriseData['effectif']));
        $this->Created_UserID=htmlspecialchars(strip_tags($entrepriseData['Created_UserID']));
        $this->Created_Date=htmlspecialchars(strip_tags($entrepriseData['Created_Date']));


        $stmt->bindParam(":nomEntreprise", $this->nomEntreprise);
        $stmt->bindParam(":adresse", $this->adresse);
        $stmt->bindParam(":adresse2", $this->adresse2);
        $stmt->bindParam(":ville", $this->ville);
        $stmt->bindParam(":codePostal", $this->codePostal);
        $stmt->bindParam(":tel", $this->tel);
        $stmt->bindParam(":dep_geo", $this->dep_geo);
        $stmt->bindParam(":siret", $this->siret);
        $stmt->bindParam(":naf", $this->naf);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":effectif", $this->effectif);
        $stmt->bindParam(":Created_UserID", $this->Created_UserID);
        $stmt->bindParam(":Created_Date", $this->Created_Date);

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

    // Créer une nouvelle entreprise
    public function create($entrepriseData){
        $query = "INSERT INTO " . $this->table_name . " SET
        nomEntreprise=:nomEntreprise,
        adresse=:adresse, ville=:ville,
        tel=:tel,
        codePostal=:codePostal,
        Created_Date=:Created_Date,
        Created_UserID=:Created_UserID,
        dep_geo=:dep_geo,
        code_ape=:code_ape,
        effectif=:effectif";

        $stmt = $this->conn->prepare($query);

        // Nettoyage et assignation des valeurs
        $this->nomEntreprise=htmlspecialchars(strip_tags($entrepriseData['nomEntreprise']));
        $this->adresse=htmlspecialchars(strip_tags($entrepriseData['adresse']));
        $this->ville=htmlspecialchars(strip_tags($entrepriseData['ville']));
        $this->tel=htmlspecialchars(strip_tags($entrepriseData['tel']));
        $this->codePostal=htmlspecialchars(strip_tags($entrepriseData['codePostal']));
        $this->Created_UserID=htmlspecialchars(strip_tags($entrepriseData['Created_UserID']));
        $this->Created_Date=htmlspecialchars(strip_tags($entrepriseData['Created_Date']));
        $this->dep_geo=htmlspecialchars(strip_tags($entrepriseData['dep_geo']));
        $this->code_ape=htmlspecialchars(strip_tags($entrepriseData['code_ape']));
        $this->effectif=htmlspecialchars(strip_tags($entrepriseData['effectif']));


        $stmt->bindParam(":nomEntreprise", $this->nomEntreprise);
        $stmt->bindParam(":adresse", $this->adresse);
        $stmt->bindParam(":ville", $this->ville);
        $stmt->bindParam(":tel", $this->tel);
        $stmt->bindParam(":codePostal", $this->codePostal);
        $stmt->bindParam(":Created_UserID", $this->Created_UserID);
        $stmt->bindParam(":Created_Date", $this->Created_Date);
        $stmt->bindParam(":dep_geo", $this->dep_geo);
        $stmt->bindParam(":code_ape", $this->code_ape);
        $stmt->bindParam(":effectif", $this->effectif);

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

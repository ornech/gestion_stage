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

    // entreprise_create_siret
    // Créer une nouvelle entreprise
    public function entreprise_create_siret($siret){

      // Récupérer le code NAF sélectionné
      if (isset($_GET['siret'])) {
          $siret = $_GET['siret'];

          // Mettre à jour l'URL avec le nouveau code NAF
          $url = "https://api.insee.fr/entreprises/sirene/V3.11/siret/";
          $url = $url . $siret;

      }
      // Clé d'API
      $api_key = '94bcc60b-d0b4-3b55-8f7c-a1e5156a760b';

      // Configuration de la requête cURL
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Accept: application/json',
          'Authorization: Bearer ' . $api_key
      ));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      // Exécution de la requête
      $response = curl_exec($ch);

      // Vérification des erreurs
      if ($response === false) {
          die('Erreur lors de la récupération des données de l\'API: ' . curl_error($ch));
      }

      // Fermeture de la session cURL
      curl_close($ch);

      // Décode la réponse JSON en tableau PHP
      $entrepriseData = json_decode($response, true);
      //echo $response;
      // Vérifie si le décodage a réussi
      if ($entrepriseData === null && json_last_error() !== JSON_ERROR_NONE) {
          die('Erreur lors du décodage de la réponse JSON.');
      }

        // nomEntreprise
        // adresse
        // adresse2
        // ville
        // tel
        // codePostal
        // dep_geo
        // siret
        // naf
        // type
        // effectif
        // Created_UserID
        // Created_Date

        $query = "INSERT INTO " . $this->table_name . " SET
        nomEntreprise=:nomEntreprise,
        adresse=:adresse,
        ville=:ville,
        codePostal=:codePostal,
        siret=:siret,
        naf=:naf,
        effectif=:effectif,
        type=:type,
        Created_Date=NOW(),
        Created_UserID=:Created_UserID
        ";


        $stmt = $this->conn->prepare($query);

        // Nettoyage et assignation des valeurs
        // var_dump($entrepriseData['etablissement']);
        $addr = $entrepriseData['etablissement']['adresseEtablissement']['numeroVoieEtablissement'] . " "
        . $entrepriseData['etablissement']['adresseEtablissement']['typeVoieEtablissement'] . " "
        . $entrepriseData['etablissement']['adresseEtablissement']['libelleVoieEtablissement'];

        $this->nomEntreprise=htmlspecialchars(strip_tags($entrepriseData['etablissement']['uniteLegale']['denominationUniteLegale']));
        $this->adresse=$addr;
        $this->ville=htmlspecialchars(strip_tags($entrepriseData['etablissement']['adresseEtablissement']['libelleCommuneEtablissement']));
        $this->codePostal=htmlspecialchars(strip_tags($entrepriseData['etablissement']['adresseEtablissement']['codePostalEtablissement']));
        $this->siret=$siret;
        $this->naf=htmlspecialchars(strip_tags($entrepriseData['etablissement']['uniteLegale']['activitePrincipaleUniteLegale']));
        $this->type=htmlspecialchars(strip_tags($entrepriseData['etablissement']['trancheEffectifsEtablissement']));
        $this->effectif=htmlspecialchars(strip_tags($entrepriseData['etablissement']['trancheEffectifsEtablissement']));
        $this->Created_UserID=htmlspecialchars(strip_tags($_SESSION['userID']));

        $stmt->bindParam(":nomEntreprise", $this->nomEntreprise);
        $stmt->bindParam(":adresse", $this->adresse);
        $stmt->bindParam(":ville", $this->ville);
        $stmt->bindParam(":codePostal", $this->codePostal);
        $stmt->bindParam(":siret", $this->siret);
        $stmt->bindParam(":naf", $this->naf);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":effectif", $this->effectif);
        $stmt->bindParam(":Created_UserID", $this->Created_UserID);

        try {
                if($stmt->execute()){
                  header("Location: ../router.php?page=erreur&message=$message");

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
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function read_fiche_siret($siret) {
        $query = "SELECT * FROM vue_entreprise WHERE siret = :siret";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':siret', $siret, PDO::PARAM_INT);
        $stmt->execute();
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

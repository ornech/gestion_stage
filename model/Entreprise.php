<?php

class Entreprise {
  private $conn;
  private $table_name = "entreprise";
  private $vue_name = "vue_entreprise";
  public $idEntreprise;
  public $nomEntreprise;
  public $adresse;
  public $adresse2;
  public $ville;
  public $tel;
  public $dep_geo;
  public $codePostal;
  public $siret;
  public $naf;
  public $type;
  public $effectif;
  public $Created_UserID;
  public $Created_Date;
  public $indice_fiabilite;
  public $code_ape;

  public function __construct($db){
    $this->conn = $db;
  }

  // Créer une nouvelle entreprise
  public function importer($entrepriseData){
    require_once '../controller/controller_log.php';

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
    Created_Date=:Created_Date,
    entreprise_valide=1";

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
        //Obtenir les données que l'on vient de créer dans la table
        $newValue = $this->read_fiche($this->conn->lastInsertId());
        if(addLog($this->conn, 1, $this->Created_UserID, "entrerprise", $newValue->EntrepriseID, null, $newValue)){
          return true;
        }
        return false;
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
  public function create($entrepriseData, $statut){
    $query = "INSERT INTO " . $this->table_name . " SET
    nomEntreprise=:nomEntreprise,
    adresse=:adresse, ville=:ville,
    tel=:tel,
    codePostal=:codePostal,
    Created_Date=:Created_Date,
    Created_UserID=:Created_UserID,
    dep_geo=:dep_geo,
    naf=:naf,
    effectif=:effectif";

    if($statut == "Professeur"){
      $query .= ", entreprise_valide=1";
    }

    $stmt = $this->conn->prepare($query);

    // Nettoyage et assignation des valeurs
    $this->nomEntreprise= isset($entrepriseData['nomEntreprise']) ? htmlspecialchars(strip_tags($entrepriseData['nomEntreprise'])) : null;
    $this->adresse = isset($entrepriseData['adresse']) ? htmlspecialchars(strip_tags($entrepriseData['adresse'])) : null;
    $this->ville = isset($entrepriseData['ville']) ? htmlspecialchars(strip_tags($entrepriseData['ville'])) : null;
    $this->tel = isset($entrepriseData['tel']) ? htmlspecialchars(strip_tags($entrepriseData['tel'])) : null;
    $this->codePostal = isset($entrepriseData['codePostal']) ? htmlspecialchars(strip_tags($entrepriseData['codePostal'])) : null;
    $this->Created_UserID = isset($entrepriseData['Created_UserID']) ? htmlspecialchars(strip_tags($entrepriseData['Created_UserID'])) : null;
    $this->Created_Date = isset($entrepriseData['Created_Date']) ? htmlspecialchars(strip_tags($entrepriseData['Created_Date'])) : null;
    $this->dep_geo = isset($entrepriseData['dep_geo']) ? htmlspecialchars(strip_tags($entrepriseData['dep_geo'])) : null;
    $this->naf = isset($entrepriseData['code_ape']) ? htmlspecialchars(strip_tags($entrepriseData['code_ape'])) : null;
    $this->effectif = isset($entrepriseData['effectif']) ? htmlspecialchars(strip_tags($entrepriseData['effectif'])) : null;


    $stmt->bindParam(":nomEntreprise", $this->nomEntreprise);
    $stmt->bindParam(":adresse", $this->adresse);
    $stmt->bindParam(":ville", $this->ville);
    $stmt->bindParam(":tel", $this->tel);
    $stmt->bindParam(":codePostal", $this->codePostal);
    $stmt->bindParam(":Created_UserID", $this->Created_UserID);
    $stmt->bindParam(":Created_Date", $this->Created_Date);
    $stmt->bindParam(":dep_geo", $this->dep_geo);
    $stmt->bindParam(":naf", $this->code_ape);
    $stmt->bindParam(":effectif", $this->effectif);

    if($stmt->execute()){
      //Obtenir les données que l'on vient de créer dans la table
      return true;
    } else {
      throw new Exception("Erreur lors de l'exécution de la requête.");
    }
  }

  // entreprise_create_siret
  // Créer une nouvelle entreprise
  public function entreprise_create_siret($siret, $isPopup){
    // Vérifie si le SIRET est défini et non vide
    if (isset($siret) && !empty($siret)) {
      // Met à jour l'URL avec le nouveau SIRET
      $url = "https://api.insee.fr/entreprises/sirene/V3.11/siret/" . $siret;
    } else {
      die('Erreur : le SIRET n\'est pas défini ou est vide.');
    }

    // Clé d'API
    $api_key = '01702018-fa7f-34df-8354-a841f68f821b';

    // Configuration de la requête cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Accept: application/json',
      'Authorization: Bearer ' . $api_key
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // Exécution de la requête
    $response = curl_exec($ch);

    // Vérification des erreurs cURL
    if ($response === false) {
      die('Erreur lors de la récupération des données de l\'API: ' . curl_error($ch));
    }

    // Fermeture de la session cURL
    curl_close($ch);

    // Décode la réponse JSON en tableau PHP
    $entrepriseData = json_decode($response, true);

    // Vérifie si le décodage a réussi
    if ($entrepriseData === null && json_last_error() !== JSON_ERROR_NONE) {
      die('Erreur lors du décodage de la réponse JSON: ' . json_last_error_msg());
    }

    // Debugging
    // echo "<hr>";
    // var_dump($response);
    // var_dump($entrepriseData);

    // Vérifie le statut de la réponse
    if (isset($entrepriseData["header"]["statut"]) && $entrepriseData["header"]["statut"] == 200) {
      // Continuer avec le reste du traitement
      echo 'Réponse API valide. Continuer le traitement...';
    } else {
      die('Erreur : ["header"]["statut"] != 200 ou non défini.');
    }

    // Prépare les données pour l'insertion
    $addr = $entrepriseData['etablissement']['adresseEtablissement']['numeroVoieEtablissement'] . " "
    . $entrepriseData['etablissement']['adresseEtablissement']['typeVoieEtablissement'] . " "
    . $entrepriseData['etablissement']['adresseEtablissement']['libelleVoieEtablissement'];

    $this->nomEntreprise = htmlspecialchars(strip_tags($entrepriseData['etablissement']['uniteLegale']['denominationUniteLegale'] ?? '-'));
    $this->adresse = htmlspecialchars(strip_tags($addr ?? '-'));
    $this->ville = htmlspecialchars(strip_tags($entrepriseData['etablissement']['adresseEtablissement']['libelleCommuneEtablissement'] ?? '-'));
    $this->codePostal = htmlspecialchars(strip_tags($entrepriseData['etablissement']['adresseEtablissement']['codePostalEtablissement'] ?? '-'));
    $this->siret = htmlspecialchars(strip_tags($siret ?? '-'));
    $this->naf = htmlspecialchars(strip_tags($entrepriseData['etablissement']['uniteLegale']['activitePrincipaleUniteLegale'] ?? '-'));
    $this->type = htmlspecialchars(strip_tags($entrepriseData['etablissement']['uniteLegale']['categorieJuridiqueUniteLegale'] ?? '-'));
    $this->effectif = htmlspecialchars(strip_tags($entrepriseData['etablissement']['trancheEffectifsEtablissement'] ?? '-'));
    $this->Created_UserID = htmlspecialchars(strip_tags($_SESSION['userID']));

    // Prépare la requête SQL
    $query = "INSERT INTO " . $this->table_name . " SET
    nomEntreprise = :nomEntreprise,
    adresse = :adresse,
    ville = :ville,
    codePostal = :codePostal,
    siret = :siret,
    naf = :naf,
    effectif = :effectif,
    type = :type,
    Created_Date = NOW(),
    Created_UserID = :Created_UserID,
    entreprise_valide=1";

    $stmt = $this->conn->prepare($query);

    // Lie les paramètres
    $stmt->bindParam(":nomEntreprise", $this->nomEntreprise);
    $stmt->bindParam(":adresse", $this->adresse);
    $stmt->bindParam(":ville", $this->ville);
    $stmt->bindParam(":codePostal", $this->codePostal);
    $stmt->bindParam(":siret", $this->siret);
    $stmt->bindParam(":naf", $this->naf);
    $stmt->bindParam(":type", $this->type);
    $stmt->bindParam(":effectif", $this->effectif);
    $stmt->bindParam(":Created_UserID", $this->Created_UserID);

    // Exécution de la requête et gestion des erreurs
    try {
      if ($stmt->execute()) {
        //Obtenir les données que l'on vient de créer dans la table
        return true;
      } else {
        $errorInfo = $stmt->errorInfo();
        $message = "Erreur SQL : " . $errorInfo[2];
        header("Location: ../router.php?page=erreur&message=" . urlencode($message));
        return false;
      }
    } catch (Exception $e) {
      $errorInfo = $stmt->errorInfo();
      if ($errorInfo[0] == 45001) {
        if($isPopup == true){
          return true;
        }else{
          $result = $this->read_fiche_siret($siret);
          header("Location: ../router.php?page=fiche_entreprise&idEntreprise=" . $result->EntrepriseID);
        }
      } else {
        $message = "Erreur SQL : " . $e->getMessage();
        header("Location: ../router.php?page=erreur&message=" . urlencode($message));
      }
      return false;
    }
  }

  // Liste des entreprises
  public function read(){
    $query = "SELECT * FROM " . $this->vue_name . " WHERE entreprise_valide = 1";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function read_fiche($idEntreprise) {
    $query = "SELECT * FROM ". $this->vue_name . " WHERE EntrepriseID = :idEntreprise";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':idEntreprise', $idEntreprise, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  public function read_fiche_siret($siret) {
    $query = "SELECT * FROM ". $this->vue_name . " WHERE siret = :siret";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':siret', $siret, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  // Modèle Entreprise
  public function update($id, $nouvelles_infos) {
    require_once '../controller/controller_log.php';

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

  public function update_api($id, $siret){

    $query = "SELECT * FROM ". $this->vue_name . " WHERE EntrepriseID = :idEntreprise";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':idEntreprise', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data_entreprise = $stmt->fetch(PDO::FETCH_OBJ);

    //var_dump($data_entreprise);

    // Token d'accès
    $token = '01702018-fa7f-34df-8354-a841f68f821b';


    // Paramètres de recherche
    // $search_params = [
    //     'denominationUniteLegale' => $data_entreprise->nomEntreprise,
    //     //'codePostalEtablissement' => $data_entreprise->codePostal,
    //     'libelleCommuneEtablissement' => $data_entreprise->ville
    // ];

    // Construire le paramètre `q`
    // $query_parts = [];
    // foreach ($search_params as $key => $value) {
    //   $query_parts[] = "$key:$value";
    // }
    // $q = implode(' AND ', $query_parts);
    if (isset($data_entreprise->siret)) {
      $q = "siret:" . $data_entreprise->siret;
    }else if($siret){
      $q = "siret:" . $siret;
    }else {
      echo "Ajouter d'abord un N° de Siret à votre entreprise";
      exit;
    }

    // Paramètres de la requête
    $params = [
      'q' => $q,
      'nombre' => 1
    ];

    // Construire l'URL de requête
    $query = http_build_query($params);
    $url = "https://api.insee.fr/entreprises/sirene/V3.11/siret?$query";

    // Initialiser cURL
    $ch = curl_init();

    // Configurer les options cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
      "Authorization: Bearer $token",
      "Accept: application/json"
    ]);

    // Exécuter la requête et obtenir la réponse
    $response = curl_exec($ch);

    // Vérifier les erreurs
    if (curl_errno($ch)) {
      echo 'Erreur cURL : ' . curl_error($ch);
    } else {
      $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      if ($http_code === 200) {
        // Réponse réussie
        $entrepriseData = json_decode($response, true);
        // Prépare les données pour l'insertion

        $entreprise = $entrepriseData['etablissements'][0];

        $addr = $entreprise['adresseEtablissement']['numeroVoieEtablissement'] . " "
        . $entreprise['adresseEtablissement']['typeVoieEtablissement'] . " "
        . $entreprise['adresseEtablissement']['libelleVoieEtablissement'];

        $this->nomEntreprise = htmlspecialchars(strip_tags($entreprise['uniteLegale']['denominationUniteLegale'] ?? '-'));
        $this->adresse = htmlspecialchars(strip_tags($addr ?? '-'));
        $this->ville = htmlspecialchars(strip_tags($entreprise['adresseEtablissement']['libelleCommuneEtablissement'] ?? '-'));
        $this->codePostal = htmlspecialchars(strip_tags($entreprise['adresseEtablissement']['codePostalEtablissement'] ?? '-'));
        $this->siret = htmlspecialchars(strip_tags($entreprise['siret'] ?? '-'));
        $this->naf = htmlspecialchars(strip_tags($entreprise['uniteLegale']['activitePrincipaleUniteLegale'] ?? '-'));
        $this->type = htmlspecialchars(strip_tags($entreprise['uniteLegale']['categorieJuridiqueUniteLegale'] ?? '-'));
        $this->effectif = htmlspecialchars(strip_tags($entreprise['trancheEffectifsEtablissement'] ?? '-'));
        $this->Created_UserID = htmlspecialchars(strip_tags($_SESSION['userID']));

        $query = "UPDATE " . $this->table_name . " SET
          nomEntreprise = :nomEntreprise,
          adresse = :adresse,
          ville = :ville,
          codePostal = :codePostal,
          siret = :siret,
          naf = :naf,
          effectif = :effectif,
          type = :type,
          Created_Date = NOW(),
          Created_UserID = :Created_UserID
          WHERE id = :id";

      $stmt = $this->conn->prepare($query);

      // Lie les paramètres
      $stmt->bindParam(":nomEntreprise", $this->nomEntreprise);
      $stmt->bindParam(":adresse", $this->adresse);
      $stmt->bindParam(":ville", $this->ville);
      $stmt->bindParam(":codePostal", $this->codePostal);
      $stmt->bindParam(":siret", $this->siret);
      $stmt->bindParam(":naf", $this->naf);
      $stmt->bindParam(":type", $this->type);
      $stmt->bindParam(":effectif", $this->effectif);
      $stmt->bindParam(":Created_UserID", $this->Created_UserID);
      $stmt->bindParam(":id", $id);

        try {
            if ($stmt->execute()) {
                // Obtenir les données que l'on vient de créer dans la table
                return true;
            } else {
                $query = $stmt->queryString;
                $message = "Erreur SQL : " . implode(", ", $stmt->errorInfo()) . " | Requête : " . $query;
                header("Location: ../router.php?page=erreur&message=" . urlencode($message));
                return false;
            }
        } catch (Exception $e) {
            $query = $stmt->queryString;
            $message = "Erreur SQL: " . $e->getMessage() . " <HR> Requête : " . $query ;
            header("Location: ../router.php?page=erreur&message=" . urlencode($message));
            return false;
        }



      } else {
        // Erreur de l'API
        echo "Erreur API : HTTP $http_code\n";
        echo $response;
      }
    }

    // Fermer la session cURL
    curl_close($ch);
  }

  public function valider_entreprise($id){
    $query = "UPDATE " . $this->table_name . " SET entreprise_valide = 1 WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    try {
      if($stmt->execute()){
          return true;
      } else {
          throw new Exception("Erreur lors de l'exécution de la requête.");
      }
    } catch (Exception $e) {
        //echo "Erreur : " . $e->getMessage();
        $message = "Erreur SQL : " . implode(", ", $stmt->errorInfo());
        header("Location: ../router.php?page=erreur&title=Validation Entreprise&message=$message");
        return false;
    }
  }

  // Supprimer une entreprise
  public function delete($id){
    $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $this->idEntreprise=htmlspecialchars(strip_tags($id));
    $stmt->bindParam(":id", $this->idEntreprise);
    if($stmt->execute()){
      return true;
    }
    return false;
  }
}
?>

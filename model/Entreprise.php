<?php

class Entreprise {
  private $conn;
  private $table_name = "entreprise";
  private $vue_name = "vue_entreprise";
  private $anomymousId = -1;
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
  public function entreprise_create_siret($siret, $isPopup)
  {
    // 1) Validation minimale du SIRET (14 chiffres)
    $siret = preg_replace('/\D+/', '', (string)$siret);
    if ($siret === '' || strlen($siret) !== 14) {
      die("Erreur : SIRET invalide (attendu 14 chiffres).");
    }

    // 2) Endpoint INSEE Sirene (celui que tu as validé en curl)
    $url = "https://api.insee.fr/api-sirene/3.11/siret/" . $siret;

    // 3) Clé d'intégration (à sortir en config hors dépôt)
    $api_key = 'ff3a45fd-9f10-4651-ba45-fd9f105651ff';

    // 4) Appel API (exécuter AVANT curl_getinfo)
    $ch = curl_init($url);
    curl_setopt_array($ch, [
      CURLOPT_HTTPHEADER => [
        'Accept: application/json',
        'X-INSEE-Api-Key-Integration: ' . $api_key,
      ],
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CONNECTTIMEOUT => 5,
      CURLOPT_TIMEOUT => 10,
    ]);

    $response = curl_exec($ch);

    if ($response === false) {
      $err = curl_error($ch);
      $eno = curl_errno($ch);
      curl_close($ch);
      die("Erreur cURL: errno=$eno error=$err");
    }

    $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $ct   = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
    curl_close($ch);

    if ($http !== 200 || stripos((string)$ct, 'application/json') === false) {
      die("Erreur API INSEE: HTTP=$http CT=$ct BODY=" . substr($response, 0, 200));
    }

    // 5) JSON decode
    $entrepriseData = json_decode($response, true);
    if (!is_array($entrepriseData)) {
      die('Erreur lors du décodage JSON: ' . json_last_error_msg());
    }

    if (!isset($entrepriseData["header"]["statut"]) || (int)$entrepriseData["header"]["statut"] !== 200) {
      die('Erreur : réponse INSEE inattendue (header.statut != 200). BODY=' . substr($response, 0, 200));
    }

    // 6) Préparation des champs 
    $etab = $entrepriseData['etablissement'] ?? [];
    $ul   = $etab['uniteLegale'] ?? [];
    $ae   = $etab['adresseEtablissement'] ?? [];

    $addr = trim(implode(' ', array_filter([
      $ae['numeroVoieEtablissement'] ?? null,
      $ae['indiceRepetitionEtablissement'] ?? null,
      $ae['typeVoieEtablissement'] ?? null,
      $ae['libelleVoieEtablissement'] ?? null,
    ], fn($v) => $v !== null && $v !== '')));

    // Attention: htmlspecialchars/strip_tags sur données “métier” peut dégrader des libellés (apostrophes, etc.).
    $this->nomEntreprise = htmlspecialchars(strip_tags($ul['denominationUniteLegale'] ?? '-'));
    $this->adresse       = htmlspecialchars(strip_tags($addr !== '' ? $addr : ($ae['complementAdresseEtablissement'] ?? '-')));
    $this->ville         = htmlspecialchars(strip_tags($ae['libelleCommuneEtablissement'] ?? '-'));
    $this->codePostal    = htmlspecialchars(strip_tags($ae['codePostalEtablissement'] ?? '-'));
    $this->siret         = htmlspecialchars(strip_tags($siret));
    $this->naf           = htmlspecialchars(strip_tags($ul['activitePrincipaleUniteLegale'] ?? ($etab['activitePrincipaleEtablissement'] ?? '-')));
    $this->type          = htmlspecialchars(strip_tags($ul['categorieJuridiqueUniteLegale'] ?? '-'));
    $this->effectif      = htmlspecialchars(strip_tags($etab['trancheEffectifsEtablissement'] ?? '-'));

    if (session_status() !== PHP_SESSION_ACTIVE) {
      session_start();
    }
    $this->Created_UserID = htmlspecialchars(strip_tags($_SESSION['userID'] ?? ''));

    if ($this->Created_UserID === '') {
      die("Erreur : utilisateur non authentifié (session userID absent).");
    }

    // 7) INSERT
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
        entreprise_valide = 1";

    $stmt = $this->conn->prepare($query);

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
      if ($stmt->execute()) {
        return true;
      }

      $errorInfo = $stmt->errorInfo();
      $message = "Erreur SQL : " . ($errorInfo[2] ?? 'inconnue');
      header("Location: ../router.php?page=erreur&message=" . urlencode($message));
      return false;
    } catch (Exception $e) {
      $errorInfo = $stmt->errorInfo();

      $sqlState = $errorInfo[0] ?? null;

      if ($sqlState === '45001') {
        if ($isPopup == true) {
          return true;
        }
        $result = $this->read_fiche_siret($siret);
        header("Location: ../router.php?page=fiche_entreprise&idEntreprise=" . $result->EntrepriseID);
        return false;
      }

      $message = "Erreur SQL : " . $e->getMessage();
      header("Location: ../router.php?page=erreur&message=" . urlencode($message));
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

  public function updateNom($idEntreprise, $nomEntreprise){
    $query = "UPDATE " . $this->table_name . " SET nomEntreprise = :nomEntreprise WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $this->nomEntreprise = htmlspecialchars(strip_tags($nomEntreprise));
    $stmt->bindParam(':nomEntreprise', $this->nomEntreprise);
    $stmt->bindParam(':id', $idEntreprise);
    if($stmt->execute()){
      return true;
    }
    return false;
  }

  /* public function update_api($id, $siret){

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
  } */
  public function update_api($id, $siret)
  {
    // 1) Charger l'entreprise (source locale)
    $query = "SELECT * FROM " . $this->vue_name . " WHERE EntrepriseID = :idEntreprise";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':idEntreprise', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data_entreprise = $stmt->fetch(PDO::FETCH_OBJ);

    if (!$data_entreprise) {
      die("Erreur : EntrepriseID introuvable.");
    }

    // 2) Choisir le SIRET (14 chiffres)
    $picked = $data_entreprise->siret ?? $siret ?? '';
    $picked = preg_replace('/\D+/', '', (string)$picked);

    if ($picked === '' || strlen($picked) !== 14) {
      die("Ajouter d'abord un N° de SIRET valide (14 chiffres).");
    }

    // 3) Appel INSEE Sirene (même schéma que la fonction qui marche)
    $url = "https://api.insee.fr/api-sirene/3.11/siret/" . $picked;

    // Clé d'intégration (à sortir en config hors dépôt)
    $api_key = 'ff3a45fd-9f10-4651-ba45-fd9f105651ff';

    $ch = curl_init($url);
    curl_setopt_array($ch, [
      CURLOPT_HTTPHEADER => [
        'Accept: application/json',
        'X-INSEE-Api-Key-Integration: ' . $api_key,
      ],
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CONNECTTIMEOUT => 5,
      CURLOPT_TIMEOUT => 10,
    ]);

    $response = curl_exec($ch);

    if ($response === false) {
      $err = curl_error($ch);
      $eno = curl_errno($ch);
      curl_close($ch);
      die("Erreur cURL: errno=$eno error=$err");
    }

    $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $ct   = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
    curl_close($ch);

    if ($http !== 200 || stripos((string)$ct, 'application/json') === false) {
      die("Erreur API INSEE: HTTP=$http CT=$ct BODY=" . substr($response, 0, 200));
    }

    $entrepriseData = json_decode($response, true);
    if (!is_array($entrepriseData)) {
      die('Erreur lors du décodage JSON: ' . json_last_error_msg());
    }
    if (!isset($entrepriseData["header"]["statut"]) || (int)$entrepriseData["header"]["statut"] !== 200) {
      die('Erreur : réponse INSEE inattendue (header.statut != 200). BODY=' . substr($response, 0, 200));
    }

    // 4) Extraction robuste des champs (structure /siret/{siret})
    $etab = $entrepriseData['etablissement'] ?? [];
    $ul   = $etab['uniteLegale'] ?? [];
    $ae   = $etab['adresseEtablissement'] ?? [];

    $addr = trim(implode(' ', array_filter([
      $ae['numeroVoieEtablissement'] ?? null,
      $ae['indiceRepetitionEtablissement'] ?? null,
      $ae['typeVoieEtablissement'] ?? null,
      $ae['libelleVoieEtablissement'] ?? null,
    ], fn($v) => $v !== null && $v !== '')));

    $this->nomEntreprise = htmlspecialchars(strip_tags($ul['denominationUniteLegale'] ?? '-'));
    $this->adresse       = htmlspecialchars(strip_tags($addr !== '' ? $addr : ($ae['complementAdresseEtablissement'] ?? '-')));
    $this->ville         = htmlspecialchars(strip_tags($ae['libelleCommuneEtablissement'] ?? '-'));
    $this->codePostal    = htmlspecialchars(strip_tags($ae['codePostalEtablissement'] ?? '-'));
    $this->siret         = htmlspecialchars(strip_tags($etab['siret'] ?? $picked));
    $this->naf           = htmlspecialchars(strip_tags($ul['activitePrincipaleUniteLegale'] ?? ($etab['activitePrincipaleEtablissement'] ?? '-')));
    $this->type          = htmlspecialchars(strip_tags($ul['categorieJuridiqueUniteLegale'] ?? '-'));
    $this->effectif      = htmlspecialchars(strip_tags($etab['trancheEffectifsEtablissement'] ?? '-'));

    if (session_status() !== PHP_SESSION_ACTIVE) {
      session_start();
    }
    $this->Created_UserID = htmlspecialchars(strip_tags($_SESSION['userID'] ?? ''));
    if ($this->Created_UserID === '') {
      die("Erreur : utilisateur non authentifié (session userID absent).");
    }

    // 5) UPDATE (attention: ta clause WHERE utilisait id, alors que tu passes EntrepriseID)
    // Je garde ton intention : ici on met à jour par EntrepriseID.
    /* $query = "UPDATE " . $this->table_name . " SET
        nomEntreprise = :nomEntreprise,
        adresse = :adresse,
        ville = :ville,
        codePostal = :codePostal,
        siret = :siret,
        naf = :naf,
        effectif = :effectif,
        type = :type,
        Created_UserID = :Created_UserID
        WHERE EntrepriseID = :id"; */
    $query = "UPDATE " . $this->table_name . " SET
    nomEntreprise = :nomEntreprise,
    adresse = :adresse,
    ville = :ville,
    codePostal = :codePostal,
    siret = :siret,
    naf = :naf,
    effectif = :effectif,
    type = :type,
    Created_UserID = :Created_UserID
    WHERE id = :id";


    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":nomEntreprise", $this->nomEntreprise);
    $stmt->bindParam(":adresse", $this->adresse);
    $stmt->bindParam(":ville", $this->ville);
    $stmt->bindParam(":codePostal", $this->codePostal);
    $stmt->bindParam(":siret", $this->siret);
    $stmt->bindParam(":naf", $this->naf);
    $stmt->bindParam(":type", $this->type);
    $stmt->bindParam(":effectif", $this->effectif);
    $stmt->bindParam(":Created_UserID", $this->Created_UserID);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    try {
      if ($stmt->execute()) {
        return true;
      }

      $q = $stmt->queryString;
      $message = "Erreur SQL : " . implode(", ", $stmt->errorInfo()) . " | Requête : " . $q;
      header("Location: ../router.php?page=erreur&message=" . urlencode($message));
      return false;
    } catch (Exception $e) {
      $q = $stmt->queryString;
      $message = "Erreur SQL: " . $e->getMessage() . " | Requête : " . $q;
      header("Location: ../router.php?page=erreur&message=" . urlencode($message));
      return false;
    }
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

  public function anonymizeCreatedId($userId){
    $query = "UPDATE " . $this->table_name . " SET Created_UserID = " . $this->anomymousId . " WHERE Created_UserID = :Created_UserID";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':Created_UserID', $userId, PDO::PARAM_INT);
    try {
      if($stmt->execute()){
          return true;
      } else {
          throw new Exception("Erreur lors de l'exécution de la requête.");
      }
    } catch (Exception $e) {
        //echo "Erreur : " . $e->getMessage();
        $message = "Erreur SQL : " . implode(", ", $stmt->errorInfo());
        header("Location: ../router.php?page=erreur&title=Anonymisation Entreprise&message=$message");
        return false;
    }
  }

}
?>

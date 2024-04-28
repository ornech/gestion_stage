<?php
// Obtenir le chemin absolu du répertoire du fichier courant
$dir_path = __DIR__;

// Construire le chemin absolu du fichier var_data.php avec le séparateur de répertoire approprié
$var_data_path = __DIR__ . '/../vues/var_data.php';
//echo $var_data_path ;

// Inclure le fichier var_data.php s'il existe
if (file_exists($var_data_path)) {
    include_once $var_data_path;
} else {
    // Gérer l'erreur si le fichier var_data.php n'existe pas
    die('Erreur : Le fichier var_data.php est introuvable.');
}

?>




<?php
// Recherche.php
include 'vues/var_data.php';

class Recherche {
  public $api_key = '94bcc60b-d0b4-3b55-8f7c-a1e5156a760b';

  public function detail($siret) {
    // Mettre à jour l'URL avec le nouveau code postal et code NAF
    $url = "https://api.insee.fr/entreprises/sirene/V3.11/siret?q=";
    $q = "siret:$siret";
    $url = $url . $q ;

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
    $data = json_decode($response, true);


    // Vérifie si le décodage a réussi
    if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
      die('Erreur lors du décodage de la réponse JSON.');
    }

    // Extraction des données de l'entreprise
    $entreprise = $data['etablissements'][0];
    $uniteLegale = $entreprise['uniteLegale'];
    $adresse = $entreprise['adresseEtablissement'];

    // Extraction des périodes de l'établissement
    $periodes = $entreprise['periodesEtablissement'];

    // Création du tableau associatif contenant les données
    $result = array(
      "siren" => $entreprise['siren'],
      "siret" => $entreprise['siret'],
      "statutDiffusionEtablissement" => $entreprise['statutDiffusionEtablissement'],
      "dateCreationEtablissement" => $entreprise['dateCreationEtablissement'],
      "nombrePeriodesEtablissement" => $entreprise['nombrePeriodesEtablissement'],
      "etablissementSiege" => $entreprise['etablissementSiege'] ? "Oui" : "Non",
      "uniteLegale" => array(
        "etatAdministratifUniteLegale" => $uniteLegale['etatAdministratifUniteLegale'],
        "statutDiffusionUniteLegale" => $uniteLegale['statutDiffusionUniteLegale'],
        "dateCreationUniteLegale" => $uniteLegale['dateCreationUniteLegale'],
        "categorieJuridiqueUniteLegale" => $uniteLegale['categorieJuridiqueUniteLegale'],
        "denominationUniteLegale" => $uniteLegale['denominationUniteLegale'],
        "sigleUniteLegale" => $uniteLegale['sigleUniteLegale'],
        "denominationUsuelle1UniteLegale" => $uniteLegale['denominationUsuelle1UniteLegale'],
        "denominationUsuelle2UniteLegale" => $uniteLegale['denominationUsuelle2UniteLegale'],
        "denominationUsuelle3UniteLegale" => $uniteLegale['denominationUsuelle3UniteLegale'],
        "sexeUniteLegale" => $uniteLegale['sexeUniteLegale'],
        "nomUniteLegale" => $uniteLegale['nomUniteLegale'],
        "nomUsageUniteLegale" => $uniteLegale['nomUsageUniteLegale'],
        "prenom1UniteLegale" => $uniteLegale['prenom1UniteLegale'],
        "prenom2UniteLegale" => $uniteLegale['prenom2UniteLegale'],
        "prenom3UniteLegale" => $uniteLegale['prenom3UniteLegale'],
        "prenom4UniteLegale" => $uniteLegale['prenom4UniteLegale'],
        "prenomUsuelUniteLegale" => $uniteLegale['prenomUsuelUniteLegale'],
        "pseudonymeUniteLegale" => $uniteLegale['pseudonymeUniteLegale'],
        "activitePrincipaleUniteLegale" => $uniteLegale['activitePrincipaleUniteLegale'] . " (" . $uniteLegale['nomenclatureActivitePrincipaleUniteLegale'] . ")",
        "nomenclatureActivitePrincipaleUniteLegale" => $uniteLegale['nomenclatureActivitePrincipaleUniteLegale'],
        "identifiantAssociationUniteLegale" => $uniteLegale['identifiantAssociationUniteLegale'],
        "economieSocialeSolidaireUniteLegale" => $uniteLegale['economieSocialeSolidaireUniteLegale'],
        "societeMissionUniteLegale" => $uniteLegale['societeMissionUniteLegale'],
        "caractereEmployeurUniteLegale" => $uniteLegale['caractereEmployeurUniteLegale'],
        "trancheEffectifsUniteLegale" => $uniteLegale['trancheEffectifsUniteLegale'] . " (" . $uniteLegale['anneeEffectifsUniteLegale'] . ")",
        "anneeEffectifsUniteLegale" => $uniteLegale['anneeEffectifsUniteLegale'],
        "nicSiegeUniteLegale" => $uniteLegale['nicSiegeUniteLegale'],
        "categorieEntreprise" => $uniteLegale['categorieEntreprise'],
        "anneeCategorieEntreprise" => $uniteLegale['anneeCategorieEntreprise']
      ),
      "adresseEtablissement" => array(
        "numeroVoieEtablissement" => $adresse['numeroVoieEtablissement'],
        "complementAdresseEtablissement" => $adresse['complementAdresseEtablissement'],
        "indiceRepetitionEtablissement" => $adresse['indiceRepetitionEtablissement'],
        "typeVoieEtablissement" => $adresse['typeVoieEtablissement'],
        "libelleVoieEtablissement" => $adresse['libelleVoieEtablissement'],
        "codePostalEtablissement" => $adresse['codePostalEtablissement'],
        "libelleCommuneEtablissement" => $adresse['libelleCommuneEtablissement'],
        "libelleCommuneEtrangerEtablissement" => $adresse['libelleCommuneEtrangerEtablissement'],
        "distributionSpecialeEtablissement" => $adresse['distributionSpecialeEtablissement'],
        "codeCommuneEtablissement" => $adresse['codeCommuneEtablissement'],
        "codeCedexEtablissement" => $adresse['codeCedexEtablissement'],
        "libelleCedexEtablissement" => $adresse['libelleCedexEtablissement'],
        "codePaysEtrangerEtablissement" => $adresse['codePaysEtrangerEtablissement'],
        "libellePaysEtrangerEtablissement" => $adresse['libellePaysEtrangerEtablissement'],
        "identifiantAdresseEtablissement" => $adresse['identifiantAdresseEtablissement'],
        "coordonneeLambertAbscisseEtablissement" => $adresse['coordonneeLambertAbscisseEtablissement'],
        "coordonneeLambertOrdonneeEtablissement" => $adresse['coordonneeLambertOrdonneeEtablissement']
      ),
      "periodesEtablissement" => array()
    );
    // Ajout des périodes de l'établissement
    // Ajout des périodes de l'établissement
    foreach ($periodes as $periode) {
      $periodeData = array(
        "dateDebut" => $periode['dateDebut'],
        "dateFin" => $periode['dateFin'],
        "etatAdministratifEtablissement" => $periode['etatAdministratifEtablissement'],
        "changementEtatAdministratifEtablissement" => $periode['changementEtatAdministratifEtablissement'],
        "enseigne1Etablissement" => $periode['enseigne1Etablissement'],
        "enseigne2Etablissement" => $periode['enseigne2Etablissement'],
        "enseigne3Etablissement" => $periode['enseigne3Etablissement'],
        "changementEnseigneEtablissement" => $periode['changementEnseigneEtablissement'],
        "denominationUsuelleEtablissement" => $periode['denominationUsuelleEtablissement'],
        "changementDenominationUsuelleEtablissement" => $periode['changementDenominationUsuelleEtablissement'],
        "activitePrincipaleEtablissement" => $periode['activitePrincipaleEtablissement'],
        "nomenclatureActivitePrincipaleEtablissement" => $periode['nomenclatureActivitePrincipaleEtablissement'],
        "changementActivitePrincipaleEtablissement" => $periode['changementActivitePrincipaleEtablissement'],
        "caractereEmployeurEtablissement" => $periode['caractereEmployeurEtablissement'],
        "changementCaractereEmployeurEtablissement" => $periode['changementCaractereEmployeurEtablissement']
      );
      $result["periodesEtablissement"][] = $periodeData;
    }
    return $result;
  }


  public function recherche($naf, $cp) {
    // Récupérer le code NAF et le code postal sélectionnés
    if (isset($naf, $cp)) {

      $selected_naf = $naf;
      $selected_cp = $cp;

      $activitePrincipaleEtablissement = "activitePrincipaleEtablissement:" . $selected_naf;
      $codePostalEtablissement = "codePostalEtablissement:" . $selected_cp . "%20AND%20etatAdministratifUniteLegale:A%20AND%20";

      // $url = "https://api.insee.fr/entreprises/sirene/V3.11/siret?q=";
      // $codePostal = "codePostalEtablissement:" . $cp;
      // $etatAdministratif = "etatAdministratifUniteLegale:A";
      // $activitePrincipale = "periode(activitePrincipaleEtablissement:" . $naf . "%20AND%20etatAdministratifEtablissement:A%20AND%20-etatAdministratifEtablissement:F)";
      // $nombreResultats = "&nombre=50";
      // $code_naf_param = "";

      foreach ($tableau_naf as $code_naf => $description_naf) {
        // Construire l'URL de l'API avec le code NAF actuel
        $code_naf_param .= "periode(activitePrincipaleEtablissement:" . $code_naf . "%20AND%20" . $etat_administratif . ")";
      }


      // $requete = $codePostal . "%20AND%20" . $etatAdministratif . "%20AND%20" . $activitePrincipale . $nombreResultats;
      //
      // $url .= $requete;
      //
      // //echo $url;
      //
      // // Clé d'API
      // $api_key = '94bcc60b-d0b4-3b55-8f7c-a1e5156a760b';
      //
      // // Configuration de la requête cURL
      // $ch = curl_init($url);
      // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      //   'Accept: application/json',
      //   'Authorization: Bearer ' . $api_key
      // ));
      // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      //
      // // Exécution de la requête
      // $response = curl_exec($ch);
      //
      // // Vérification des erreurs
      // if ($response === false) {
      //   die('Erreur lors de la récupération des données de l\'API: ' . curl_error($ch));
      // }

      // // Fermeture de la session cURL
      // curl_close($ch);

      // Décode la réponse JSON en tableau PHP
      // $data = json_decode($response, true);

      // Lire le fichier JSON
      $json_data = file_get_contents("resultats.json");

      // Convertir le JSON en tableau associatif
      $data = json_decode($json_data, true);


      // Vérifie si le décodage a réussi
      if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
        die('Erreur lors du décodage de la réponse JSON.');
      }

      $result = '<table class="table table-striped" border="1">
      <tr>
      <th>Nom</th>
      <th>Adresse</th>
      <th>CP</th>
      <th>Ville</th>
      <th>Catégorie</th>
      <th>SIRET</th>
      <th>Activité</th>
      <th>Création</th>
      <th>Détails</th>
      </tr>';
      foreach ($data['etablissements'] as $etablissement) {
        $result .= '<tr>';
        $result .=  "<td>";

        if ($etablissement["uniteLegale"]["categorieJuridiqueUniteLegale"] === "1000"){
          $result .=  $etablissement['uniteLegale']['nomUniteLegale'] . " " . $etablissement['uniteLegale']['prenom1UniteLegale'];
        }
          else {
            $result .=  $etablissement["uniteLegale"]["denominationUniteLegale"];
        }
        $result .= "</td>";


        $result .=  '<td>';
        $result .=  $etablissement['adresseEtablissement']['numeroVoieEtablissement'];
        $result .=  " ";
        $result .=  $etablissement['adresseEtablissement']['typeVoieEtablissement'];
        $result .=  " ";
        $result .=  $etablissement['adresseEtablissement']['libelleVoieEtablissement'];
        $result .=  '</td>';
        $result .=  "<td>" . $etablissement["adresseEtablissement"]["codePostalEtablissement"] . "</td>";
        $result .=  "<td>" . $etablissement["adresseEtablissement"]["libelleCommuneEtablissement"] . "</td>";
        $result .=  "<td>" . $etablissement["uniteLegale"]["categorieEntreprise"] . "</td>";
        $result .=  "<td> <a href='https://www.societe.com/cgi-bin/search?champs=" . $etablissement["siret"] . "'target='_blank' rel='noopener noreferrer'>" . $etablissement["siret"] . "</a></td>";
        $result .=  "<td>" . $etablissement["uniteLegale"]["activitePrincipaleUniteLegale"] . "</td>";
        $result .=  "<td>" . $etablissement["dateCreationEtablissement"] . "</td>";
        $result .=  "<td><a href='router.php?page=recherche_details&siret="  . $etablissement["siret"] . "'>Voir</a></td>";
        $result .=  '</tr>';
      }

      $result .=  '</table>';

      return $result;
    }
  }
}
?>

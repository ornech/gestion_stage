<?php
// Recherche.php
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
          "SIREN" => $entreprise['siren'],
          "SIRET" => $entreprise['siret'],
          "Statut de diffusion de l'établissement" => $entreprise['statutDiffusionEtablissement'],
          "Date de création de l'établissement" => $entreprise['dateCreationEtablissement'],
          "Nombre de périodes de l'établissement" => $entreprise['nombrePeriodesEtablissement'],
          "Établissement siège" => $entreprise['etablissementSiege'] ? "Oui" : "Non",
          "Unité légale associée à l'entreprise" => array(
              "État administratif de l'unité légale" => $uniteLegale['etatAdministratifUniteLegale'],
              "Statut de diffusion de l'unité légale" => $uniteLegale['statutDiffusionUniteLegale'],
              "Date de création de l'unité légale" => $uniteLegale['dateCreationUniteLegale'],
              "Catégorie juridique de l'unité légale" => $uniteLegale['categorieJuridiqueUniteLegale'],
              "Dénomination de l'unité légale" => $uniteLegale['denominationUniteLegale'],
              "Activité principale de l'unité légale" => $uniteLegale['activitePrincipaleUniteLegale'] . " (" . $uniteLegale['nomenclatureActivitePrincipaleUniteLegale'] . ")",
              "Année des effectifs de l'unité légale" => $uniteLegale['anneeEffectifsUniteLegale'],
              "Tranche d'effectifs de l'unité légale" => $uniteLegale['trancheEffectifsUniteLegale'] . " (" . $uniteLegale['anneeEffectifsUniteLegale'] . ")",
              "NIC du siège de l'unité légale" => $uniteLegale['nicSiegeUniteLegale'],
              "Catégorie d'entreprise" => $uniteLegale['categorieEntreprise'],
              "Année de la catégorie d'entreprise" => $uniteLegale['anneeCategorieEntreprise']
          ),
          "Adresse de l'établissement" => array(
              "Numéro de voie" => $adresse['numeroVoieEtablissement'],
              "Type de voie" => $adresse['typeVoieEtablissement'],
              "Libellé de la voie" => $adresse['libelleVoieEtablissement'],
              "Code postal" => $adresse['codePostalEtablissement'],
              "Commune" => $adresse['libelleCommuneEtablissement'],
              "Code commune" => $adresse['codeCommuneEtablissement'],
              "Lattitude" => $adresse['coordonneeLambertAbscisseEtablissement'],
              "Longitude" => $adresse['coordonneeLambertOrdonneeEtablissement']
          ),
          "Périodes de l'établissement" => array()
      );

      // Ajout des périodes de l'établissement
      foreach ($periodes as $periode) {
          $result["Périodes de l'établissement"][] = array(
              "Date de début" => $periode['dateDebut'],
              "Date de fin" => $periode['dateFin'],
              "État administratif" => $periode['etatAdministratifEtablissement']
          );
      }

      return $result;
  }




  public function detail0000000($siret) {
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

    // Affichage des détails de l'entreprise
    $result = "";
    $result .= "SIREN : {$entreprise['siren']}\n";
    $result .= "SIRET : {$entreprise['siret']}\n";
    $result .= "Statut de diffusion de l'établissement : {$entreprise['statutDiffusionEtablissement']}\n";
    $result .= "Date de création de l'établissement : {$entreprise['dateCreationEtablissement']}\n";
    $result .= "Nombre de périodes de l'établissement : {$entreprise['nombrePeriodesEtablissement']}\n";
    $result .= "Établissement siège : ";
    $result .= $entreprise['etablissementSiege'] ? "Oui\n" : "Non\n";

    $result .= "\nUnité légale associée à l'entreprise :\n";
    $result .= "État administratif de l'unité légale : {$uniteLegale['etatAdministratifUniteLegale']}\n";
    $result .= "Statut de diffusion de l'unité légale : {$uniteLegale['statutDiffusionUniteLegale']}\n";
    $result .= "Date de création de l'unité légale : {$uniteLegale['dateCreationUniteLegale']}\n";
    $result .= "Catégorie juridique de l'unité légale : {$uniteLegale['categorieJuridiqueUniteLegale']}\n";
    $result .= "Dénomination de l'unité légale : {$uniteLegale['denominationUniteLegale']}\n";
    $result .= "Activité principale de l'unité légale : {$uniteLegale['activitePrincipaleUniteLegale']} ({$uniteLegale['nomenclatureActivitePrincipaleUniteLegale']})\n";
    $result .= "Année des effectifs de l'unité légale : {$uniteLegale['anneeEffectifsUniteLegale']}\n";
    $result .= "Tranche d'effectifs de l'unité légale : {$uniteLegale['trancheEffectifsUniteLegale']} ({$uniteLegale['anneeEffectifsUniteLegale']})\n";
    $result .= "NIC du siège de l'unité légale : {$uniteLegale['nicSiegeUniteLegale']}\n";
    $result .= "Catégorie d'entreprise : {$uniteLegale['categorieEntreprise']}\n";
    $result .= "Année de la catégorie d'entreprise : {$uniteLegale['anneeCategorieEntreprise']}\n";

    $result .= "\nAdresse de l'établissement :\n";
    $result .= "Numéro de voie : {$adresse['numeroVoieEtablissement']}\n";
    $result .= "Type de voie : {$adresse['typeVoieEtablissement']}\n";
    $result .= "Libellé de la voie : {$adresse['libelleVoieEtablissement']}\n";
    $result .= "Code postal : {$adresse['codePostalEtablissement']}\n";
    $result .= "Commune : {$adresse['libelleCommuneEtablissement']}\n";
    $result .= "Code commune : {$adresse['codeCommuneEtablissement']}\n";
    $result .= "Coordonnées Lambert (abscisse) : {$adresse['coordonneeLambertAbscisseEtablissement']}\n";
    $result .= "Coordonnées Lambert (ordonnée) : {$adresse['coordonneeLambertOrdonneeEtablissement']}\n";

    $result .= "\nPériodes de l'établissement :\n";
    foreach ($periodes as $periode) {
      $result .= "Date de début : {$periode['dateDebut']}, État administratif : {$periode['etatAdministratifEtablissement']}\n";
    }
    return $result;

  }
  public function recherche($naf, $cp) {
    // Votre logique de recherche ici
    // Vous pouvez utiliser les données $naf et $cp pour effectuer la recherche
    // et retourner les résultats sous forme de chaîne HTML

    $tableau_naf = array(
      '59.14Z' => 'Projection de films cinématographiques',
      '61.10Z' => 'Télécommunications filaires',
      '61.20Z' => 'Télécommunications sans fil',
      '61.30Z' => 'Télécommunications par satellite',
      '61.90Z' => 'Autres activités de télécommunication',
      '62.01Z' => 'Programmation informatique',
      '62.02A' => 'Conseil en systèmes et logiciels informatiques',
      '62.02B' => 'Tierce maintenance de systèmes et d\'applications informatiques',
      '62.03Z' => 'Gestion d\'installations informatiques',
      '62.09Z' => 'Autres activités informatiques',
      '63.11Z' => 'Traitement de données, hébergement et activités connexes',
      '63.12Z' => 'Portails Internet',
      '63.99Z' => 'Autres services d\'information n.c.a.',
      '64.11Z' => 'Activités de banque centrale',
      '64.19Z' => 'Autres intermédiations monétaires'
    );

    $codes_postaux = array(
      '17290' => "Aigrefeuille-d'Aunis",
      '17690' => 'Angoulins',
      '17530' => 'Arvert',
      '17440' => 'Aytré',
      '17560' => 'Bourcefranc-le-Chapus',
      '17920' => 'Breuillet',
      '17610' => 'Chaniers',
      '17480' => "Le Château-d'Oléron",
      '17340' => 'Châtelaillon-Plage',
      '17550' => "Dolus-d'Oléron",
      '17139' => 'Dompierre-sur-Mer',
      '17620' => 'Échillais',
      '17630' => 'La Flotte',
      '17450' => 'Fouras',
      '17220' => 'La Jarrie',
      '17500' => 'Jonzac',
      '17140' => 'Lagord',
      '17230' => 'Marans',
      '17320' => 'Marennes-Hiers-Brouage',
      '17137' => 'Marsilly',
      '17600' => 'Médis',
      '17132' => 'Meschers-sur-Gironde',
      '17130' => 'Montendre',
      '17137' => 'Nieul-sur-Mer',
      '17180' => 'Périgny',
      '17800' => 'Pons',
      '17138' => 'Puilboreau',
      '17300' => 'Rochefort',
      '17000' => 'La Rochelle',
      '17200' => 'Royan',
      '17110' => 'Saint-Georges-de-Didonne',
      '17190' => "Saint-Georges-d'Oléron",
      '17400' => "Saint-Jean-d'Angély",
      '17170' => "Saint-Jean-de-Liversay",
      '17740' => 'Sainte-Marie-de-Ré',
      '17420' => "Saint-Palais-sur-Mer",
      '17310' => "Saint-Pierre-d'Oléron",
      '17220' => 'Sainte-Soulle',
      '17200' => 'Saint-Sulpice-de-Royan',
      '17138' => 'Saint-Xandre',
      '17100' => 'Saintes',
      '17600' => 'Saujon',
      '17780' => 'Soubise',
      '17700' => 'Surgères',
      '17430' => 'Tonnay-Charente',
      '17390' => 'La Tremblade',
      '17640' => 'Vaux-sur-Mer'
    );

    // Récupérer le code NAF et le code postal sélectionnés
    if (isset($naf, $cp) && array_key_exists($naf, $tableau_naf) && array_key_exists($cp, $codes_postaux)) {
      $selected_naf = $naf;
      $selected_cp = $cp;

      $activitePrincipaleEtablissement = "activitePrincipaleEtablissement:" . $selected_naf;
      $codePostalEtablissement = "codePostalEtablissement:" . $selected_cp . "%20AND%20";

      // Mettre à jour l'URL avec le nouveau code postal et code NAF
      $url = "https://api.insee.fr/entreprises/sirene/V3.11/siret?q=";
      $period = "periode(";
      $AND = "%20AND%20";
      $fin = "%20AND%20etatAdministratifEtablissement:A)&nombre=500";
      $url = $url . $codePostalEtablissement . $period . $activitePrincipaleEtablissement . $fin;

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
        $result .=  "<td>" . $etablissement["uniteLegale"]["denominationUniteLegale"] . "</td>";
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

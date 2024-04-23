<?php

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

// HTML pour la liste déroulante
echo '<form method="get">';
echo '<select name="naf">';
foreach ($tableau_naf as $code_naf => $libelle_naf) {
    echo '<option value="' . $code_naf . '">' . $libelle_naf . '</option>';
}
echo '</select>';

echo '<select name="cp">';
$codes_postaux = array(
    '17000' => 'La Rochelle',
    '17100' => 'Saintes',
    '17200' => 'Royan',
    '17300' => 'Rochefort',
);
foreach ($codes_postaux as $code_postal => $ville) {
    echo '<option value="' . $code_postal . '">' . $ville . '</option>';
}
echo '</select>';

echo '<input type="submit" value="Changer">';
echo '</form>';

// Récupérer le code NAF et le code postal sélectionnés
if (isset($_GET['naf'], $_GET['cp']) && array_key_exists($_GET['naf'], $tableau_naf) && array_key_exists($_GET['cp'], $codes_postaux)) {
    $selected_naf = $_GET['naf'];
    $selected_cp = $_GET['cp'];

    $activitePrincipaleEtablissement = "activitePrincipaleEtablissement:" . $selected_naf;
    $codePostalEtablissement = "codePostalEtablissement:" . $selected_cp . "%20AND%20";

    // Mettre à jour l'URL avec le nouveau code postal et code NAF
    $url = "https://api.insee.fr/entreprises/sirene/V3.11/siret?q=";
    $period = "periode(";
    $AND = "%20AND%20";
    $fin = "%20AND%20etatAdministratifEtablissement:A)";
    $url = $url . $codePostalEtablissement . $period . $activitePrincipaleEtablissement . $fin;

    // Exécutez le reste du code avec la nouvelle URL...
}




// Clé d'API
$api_key = '94bcc60b-d0b4-3b55-8f7c-a1e5156a760b';

echo $url . "<BR>";
echo $url1 ;
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

// echo $response;

// ["typeVoieEtablissement"]=> string(3) "RUE" ["libelleVoieEtablissement"]=> string(14) "MARCEL PREVOST" ["codePostalEtablissement"]=> string(5) "34500" ["libelleCommuneEtablissement"]=> string(7) "BEZIERS"



// Affiche les données sous forme de tableau
echo '<table border="1">';
echo '<tr>
        <th>Nom</th>
        <th>Adresse</th>
        <th>CP</th>
        <th>Ville</th>
        <th>Catégorie</th>
        <th>SIREN</th>
        <th>SIRET</th>
        <th>Activité</th>
        <th>dateCreationUniteLegale</th>
      </tr>';
foreach ($data['etablissements'] as $etablissement) {
    echo '<tr>';
    echo "<td>" . $etablissement["uniteLegale"]["denominationUniteLegale"] . "</td>";
    echo '<td>';
    echo $etablissement['adresseEtablissement']['numeroVoieEtablissement'];
    echo " ";
    echo $etablissement['adresseEtablissement']['typeVoieEtablissement'];
    echo " ";
    echo $etablissement['adresseEtablissement']['libelleVoieEtablissement'];
    echo '</td>';
    echo "<td>" . $etablissement["adresseEtablissement"]["codePostalEtablissement"] . "</td>";
    echo "<td>" . $etablissement["adresseEtablissement"]["libelleCommuneEtablissement"] . "</td>";
    echo "<td>" . $etablissement["uniteLegale"]["categorieEntreprise"] . "</td>";
    echo "<td>" . $etablissement["siren"] . "</td>";
    echo "<td> <a href='https://www.societe.com/cgi-bin/search?champs=" . $etablissement["siret"] . "'target='_blank' rel='noopener noreferrer'>" . $etablissement["siret"] . "</a></td>";
    echo "<td>" . $etablissement["uniteLegale"]["activitePrincipaleUniteLegale"] . "</td>";
    echo "<td>" . $etablissement["dateCreationEtablissement"] . "</td>";
    // La variable periodesEtablissement est un tableau
    // Nous devons boucler à travers elle pour obtenir les valeurs souhaitées
    echo '</tr>';
}
echo '</table>';

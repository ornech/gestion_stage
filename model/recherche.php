<?php

// URL de l'API
//$url = 'https://api.insee.fr/entreprises/sirene/V3.11/siret?champs=';
//$url .= 'codeCommuneEtablissement,';
//$url .= 'activitePrincipaleEtablissement';

$url = "https://api.insee.fr/entreprises/sirene/V3.11/siret";
$q = "?q=";
$ape = "activitePrincipaleUniteLegale:62.01Z";
$cp = "";//"codePostalEtablissement:17200";
$nombre = "&nombre=10";

$url = $url . $q . $ape . $cp . $nombre ;
// Clé d'API
$api_key = '94bcc60b-d0b4-3b55-8f7c-a1e5156a760b';

echo $url;
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
    echo "<td>" . $etablissement["uniteLegale"]["dateCreationUniteLegale"] . "</td>";
    // La variable periodesEtablissement est un tableau
    // Nous devons boucler à travers elle pour obtenir les valeurs souhaitées
    echo '</tr>';
}
echo '</table>';

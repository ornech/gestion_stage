<?php
// Recherche.php

class Recherche {
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
            $fin = "%20AND%20etatAdministratifEtablissement:A)";
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
                <th>SIREN</th>
                <th>SIRET</th>
                <th>Activité</th>
                <th>dateCreationUniteLegale</th>
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
                $result .=  "<td>" . $etablissement['siren'] . "</td>";
                $result .=  "<td> <a href='https://www.societe.com/cgi-bin/search?champs=" . $etablissement["siret"] . "'target='_blank' rel='noopener noreferrer'>" . $etablissement["siret"] . "</a></td>";
                $result .=  "<td>" . $etablissement["uniteLegale"]["activitePrincipaleUniteLegale"] . "</td>";
                $result .=  "<td>" . $etablissement["dateCreationEtablissement"] . "</td>";
                $result .=  '</tr>';
            }

            $result .=  '</table>';

            return $result;
        }
    }
}
?>

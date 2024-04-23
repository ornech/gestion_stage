<?php
// URL de l'API de l'INSEE pour les données démographiques par commune
$url = 'https://geo.api.gouv.fr/communes?codeDepartement=17';

// Récupération des données JSON depuis l'API
$data = file_get_contents($url);

// Vérification des erreurs de récupération des données
if ($data === false) {
    die('Erreur lors de la récupération des données de l\'API.');
}

// Décodage des données JSON en tableau PHP
$communes = json_decode($data, true);

// Tableau pour stocker les villes de Charente-Maritime avec plus de 3000 habitants
$villes_plus_3000_habitants = array();

// Boucle à travers les communes
foreach ($communes as $commune) {
    // Vérifier si la population est supérieure à 3000 habitants
    if ($commune['population'] > 3000) {
        // Ajouter la ville au tableau avec son nom et ses codes postaux
        $villes_plus_3000_habitants[] = array(
            'nom' => $commune['nom'],
            'codesPostaux' => $commune['codesPostaux']
        );
    }
}

// Affichage des villes avec leur code postal
echo '<h2>Villes de Charente-Maritime avec plus de 3000 habitants :</h2>';
echo '<ul>';
foreach ($villes_plus_3000_habitants as $ville) {
    echo '<li><strong>' . $ville['nom'] . '</strong> - Codes postaux : ' . implode(', ', $ville['codesPostaux']) . '</li>';
}
echo '</ul>';
?>

<?php
require_once 'config/auth.php';
?>
<H2> Recherchez une entreprise</H2>
<BR>
    <div class="alert alert-info" role="alert">
      <h4 class="alert-heading">Recherchez une entreprise sur data.inpi.fr</h4>
      <p class="mb-0">Ces données sont alimentée par le Registre national des entreprises de l’INPI. Elles sont également disponibme gratuitement via le portail DATA INPI.
</p>
    </div>
<BR>
<?php

$tableau_naf = array(
    ''      => '--- Selectionnez un secteur d\'activité --- ',
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

// Récupérer les valeurs sélectionnées (s'il y en a)
$selected_naf = isset($_POST['naf']) ? $_POST['naf'] : null;
$selected_cp = isset($_POST['cp']) ? $_POST['cp'] : null;

// HTML pour la liste déroulante
echo '<form method="POST" action="router.php?page=recherche">';
echo '<div class="input-group mb-3">';
echo '<select class="form-select" name="naf" aria-label="Size 3 select example">';
foreach ($tableau_naf as $code_naf => $libelle_naf) {
    $selected = ($selected_naf === $code_naf) ? 'selected' : ''; // Vérifie si l'option doit être pré-sélectionnée
    echo '<option value="' . $code_naf . '" ' . $selected . '>' . $libelle_naf . '</option>';
    echo "\n";
}
echo '</select>';
echo "\n";

echo '<select class="form-select" name="cp">';
echo "\n";
$codes_postaux = array(
    ''      => '--- Selectionnez une ville --- ',
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
foreach ($codes_postaux as $code_postal => $ville) {
    $selected = (strval($code_postal) === strval($selected_cp)) ? 'selected' : ''; // Vérifie si l'option doit être pré-sélectionnée
    echo '<option value="' . $code_postal . '" ' . $selected . '>' . $ville . '</option>';
    echo "\n";
}
echo '</select>';
echo "\n";

echo '<input class="btn btn-outline-secondary" type="submit" value="Rechercher">';
echo '</div>';
echo '</form>';

?>
<?php echo $resultat; ?>

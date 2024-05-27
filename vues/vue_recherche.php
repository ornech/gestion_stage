<?php
require_once 'config/auth.php';
include 'vues/var_data.php';
?>
<p class="title is-2">Recherche d'entreprise</p>
<p class="subtitle is-4">Base de données SIRENE</p>

<?php

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


echo "&nbsp; <input id='cp' type='text' class='form-control' value ='" . $selected_cp . "' name='cp' placeholder='Code postal'>";
echo "\n";

echo '<input class="btn btn-outline-secondary" type="submit" value="Rechercher">';
echo '</div>';
echo '</form>';

?>
<?php echo $resultat; ?>

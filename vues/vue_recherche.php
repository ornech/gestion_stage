<?php
require_once 'config/auth.php';
include 'vues/var_data.php';
?>
<H2> Recherchez une entreprise</H2>
<BR>
    <div class="alert alert-info" role="alert">
      <h4 class="alert-heading">Recherchez une entreprise sur insee.fr</h4>
      <p class="mb-0">Ces données sont alimentée par le Registre national des entreprises et misent à disposition par l'Insee.
</p>
    </div>
<BR>

  
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

echo '<select class="form-select" name="cp">'; //
echo "\n";

foreach ($codes_postaux as $code_postal => $ville) {
    $selected = (strval($code_postal) === strval($selected_cp)) ? 'selected' : ''; // Vérifie si l'option doit être pré-sélectionnée
    echo '<option value="' . $code_postal . '" ' . $selected . '>' . $ville . '</option>';
    echo "\n";
}
echo '</select>';
echo "<input type='text' name='cp'>";
echo "\n";

echo '<input class="btn btn-outline-secondary" type="submit" value="Rechercher">';
echo '</div>';
echo '</form>';

?>
<?php echo $resultat; ?>

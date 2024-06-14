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
?>


<div class="box">
    <form method="POST" action="router.php?page=recherche">
        <div class="input-group mb-3">
            <div class="select" style="margin-bottom: 10px;"> <!-- Ajoute de l'espace sous le select -->
                <select name="naf" aria-label="Size 3 select example">
                    <?php
                    foreach ($tableau_naf as $code_naf => $libelle_naf) {
                        $selected = ($selected_naf === $code_naf) ? 'selected' : '';
                        echo '<option value="' . $code_naf . '" ' . $selected . '>' . $libelle_naf . '</option>';
                        echo "\n";
                    }
                    ?>
                </select>
            </div>
            <div class="field is-grouped" style="margin-bottom: 10px;">
    <div class="control">
        <input id="cp" type="text" class="input" name="cp" placeholder="Code postal" pattern="\d*" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
    </div>
    <div class="control">
        <button class="button is-link" type="submit">  <span class="icon is-small">
                    <i class="fas fa-search"></i>
                </span>&nbsp;&nbsp;Rechercher</button>
    </div>
</div>
        </div>
    </form>
<HR>
<p class="subtitle is-4">
Effectuer des recherches pour des stages de 
<button class="button" type="submit" onclick="openSLAM()">
    <span class="icon">
        <i class="fas fa-laptop"></i>
    </span>&nbsp;&nbsp;SLAM
</button>
 et <button id="sisrButton" class="button" type="submit">
    <span class="icon">
        <i class="fas fa-microchip"></i>
    </span>&nbsp;&nbsp;SISR
</button>
 en dehors de notre site.
</p>
</div>

<?php echo $resultat; ?>


<script>
document.getElementById('sisrButton').addEventListener('click', function() {
    window.open('https://annuaire-entreprises.data.gouv.fr/rechercher?terme=&cp_dep_label=Charente-Maritime+%2817%29&cp_dep_type=dep&cp_dep=17&fn=&n=&dmin=&dmax=&type=&label=&etat=&sap=&naf=62.02A&nature_juridique=&tranche_effectif_salarie=&categorie_entreprise=', '_blank');
});
function openSLAM() {
    window.open('https://annuaire-entreprises.data.gouv.fr/rechercher?terme=&cp_dep_label=Charente-Maritime+%2817%29&cp_dep_type=dep&cp_dep=17&fn=&n=&dmin=&dmax=&type=&label=&etat=&sap=&naf=62.01Z&nature_juridique=&tranche_effectif_salarie=&categorie_entreprise=', '_blank');
}

</script>
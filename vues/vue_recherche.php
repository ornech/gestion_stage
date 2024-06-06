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
        <button class="button" type="submit">Rechercher</button>
    </div>
</div>
        </div>
    </form>
</div>
<?php echo $resultat; ?>

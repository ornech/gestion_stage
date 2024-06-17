<?php
require_once 'config/auth.php';
include 'vues/var_data.php';

$nafTable = [
    ['code' => '59.14Z', 'label' => 'Projection de films cinématographiques'],
    ['code' => '59.20Z', 'label' => 'Enregistrement sonore et édition musicale'],
    ['code' => '60.10Z', 'label' => 'Édition et diffusion de programmes radio'],
    ['code' => '60.20A', 'label' => 'Édition de chaînes généralistes'],
    ['code' => '60.20B', 'label' => 'Édition de chaînes thématiques'],
    ['code' => '61.10Z', 'label' => 'Télécommunications filaires'],
    ['code' => '61.20Z', 'label' => 'Télécommunications sans fil'],
    ['code' => '61.30Z', 'label' => 'Télécommunications par satellite'],
    ['code' => '61.90Z', 'label' => 'Autres activités de télécommunication'],
    ['code' => '62.01Z', 'label' => 'Programmation informatique'],
    ['code' => '62.02A', 'label' => 'Conseil en systèmes et logiciels informatiques'],
    ['code' => '62.02B', 'label' => 'Tierce maintenance de systèmes et d\'applications informatiques'],
    ['code' => '62.03Z', 'label' => 'Gestion d\'installations informatiques'],
    ['code' => '62.09Z', 'label' => 'Autres activités informatiques'],
    ['code' => '63.11Z', 'label' => 'Traitement de données, hébergement et activités connexes'],
    ['code' => '63.12Z', 'label' => 'Portails Internet'],
    ['code' => '63.91Z', 'label' => 'Activités des agences de presse'],
    ['code' => '63.99Z', 'label' => 'Autres services d\'information n.c.a.'],
    ['code' => '64.11Z', 'label' => 'Activités de banque centrale'],
    ['code' => '64.19Z', 'label' => 'Autres intermédiations monétaires']
];
?>

<p class="title is-2">Recherche d'entreprise</p>
<p class="subtitle is-4">Base de données SIRENE</p>

<div class="box">
    <p class="subtitle is-4">
        Effectuer des recherches pour des stages de <button id="selectSLAM" class="button" onclick="selectNaf('slam')"><span class="icon">
                        <i class="fas fa-laptop"></i>
                    </span>&nbsp;&nbsp;SLAM</button> et  <button id="selectSISR" class="button" onclick="selectNaf('sisr')"><span class="icon">
                        <i class="fas fa-microchip"></i>
                    </span>&nbsp;&nbsp;SISR
                </button> en dehors de notre site:
    </p>
    <div class="message is-info">
    <div class="message-body">
  <p>Pour sélectionner les éléments pertinents à la spécialité SLAM ou SISR, cliquez sur les boutons correspondants en haut, puis appuyez sur le bouton Rechercher pour procéder.
  Assurez-vous de vérifier la localisation sélectionnée sur leur site, qui est par défaut en Charente-Maritime.
  </p>
</div></div><hr>
    <div class="columns">
        <div class="column is-half">
            <?php
            // Calculer la moitié de la taille du tableau pour la première colonne
            $halfCount = ceil(count($nafTable) / 2);
            
            // Afficher les éléments de la première moitié du tableau
            for ($i = 0; $i < $halfCount; $i++) {
                $naf = $nafTable[$i];
            ?>
                <div class="field">
                    <input id="<?php echo $naf['code']; ?>" type="checkbox" class="naf-checkbox" value="<?php echo $naf['code']; ?>">
                    <label for="<?php echo $naf['code']; ?>"><?php echo $naf['code']; ?> - <?php echo $naf['label']; ?></label>
                </div>
            <?php } ?>
        </div>
        <div class="column is-half">
            <?php
            // Afficher les éléments de la deuxième moitié du tableau
            for ($i = $halfCount; $i < count($nafTable); $i++) {
                $naf = $nafTable[$i];
            ?>
                <div class="field">
                    <input id="<?php echo $naf['code']; ?>" type="checkbox" class="naf-checkbox" value="<?php echo $naf['code']; ?>">
                    <label for="<?php echo $naf['code']; ?>"><?php echo $naf['code']; ?> - <?php echo $naf['label']; ?></label>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="columns">
        <div class="column is-full">
            <div class="field is-grouped is-grouped-centered">
                <div class="control">
                    <button id="generateLink" class="button is-link" onclick="generateLink()">
                        <span class="icon">
                            <i class="fas fa-search"></i>
                        </span>&nbsp;&nbsp;Recherche
                    </button>
                </div>
            </div>
        </div>
    </div>
</div> </div>
<script>
    function toggleCheckbox(row) {
        const checkbox = row.querySelector('input[type="checkbox"]');
        checkbox.checked = !checkbox.checked;
    }

    function selectNaf(type) {
        const checkboxes = document.querySelectorAll('.naf-checkbox');
        checkboxes.forEach(checkbox => {
            if (type === 'slam' && (checkbox.value === '62.01Z' || checkbox.value === '63.12Z')) {
                checkbox.checked = true;
            } else if (type === 'sisr' && (checkbox.value === '62.02A' || checkbox.value === '62.02B' || checkbox.value === '62.03Z')) {
                checkbox.checked = true;
            } else {
                checkbox.checked = false;
            }
        });
    }

    function generateLink() {
        const checkboxes = document.querySelectorAll('.naf-checkbox:checked');
        const selectedNafs = Array.from(checkboxes).map(cb => cb.value);
        
        const baseUrl = 'https://annuaire-entreprises.data.gouv.fr/rechercher?terme=&cp_dep_label=Charente-Maritime+%2817%29&cp_dep_type=dep&cp_dep=17&fn=&n=&dmin=&dmax=&type=&label=&etat=&sap=&';
        const additionalParams = '&nature_juridique=&tranche_effectif_salarie=&categorie_entreprise=';
        const fullUrl = baseUrl + selectedNafs.map(naf => `naf=${naf}`).join('&') + additionalParams;
        
        window.open(fullUrl, '_blank');
    }
</script>

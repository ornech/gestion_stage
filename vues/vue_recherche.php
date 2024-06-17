<?php
require_once 'config/auth.php';
include 'vues/var_data.php';

$nafTableSLAM = [
    ['code' => '62.01Z', 'label' => 'Programmation informatique'],
    ['code' => '63.12Z', 'label' => 'Portails Internet'],
    ['code' => '62.09Z', 'label' => 'Autres activités informatiques'],
    ['code' => '59.14Z', 'label' => 'Projection de films cinématographiques'],
    ['code' => '59.20Z', 'label' => 'Enregistrement sonore et édition musicale'],
    ['code' => '60.10Z', 'label' => 'Édition et diffusion de programmes radio'],
    ['code' => '60.20A', 'label' => 'Édition de chaînes généralistes'],
    ['code' => '60.20B', 'label' => 'Édition de chaînes thématiques'],
    ['code' => '61.10Z', 'label' => 'Télécommunications filaires'],
    ['code' => '61.20Z', 'label' => 'Télécommunications sans fil'],
    ['code' => '61.30Z', 'label' => 'Télécommunications par satellite'],
    ['code' => '61.90Z', 'label' => 'Autres activités de télécommunication'],
    ['code' => '63.91Z', 'label' => 'Activités des agences de presse'],
    ['code' => '63.99Z', 'label' => 'Autres services d\'information n.c.a.'],
    ['code' => '64.11Z', 'label' => 'Activités de banque centrale'],
    ['code' => '64.19Z', 'label' => 'Autres intermédiations monétaires']
];

$nafTableSISR = [
    ['code' => '62.02A', 'label' => 'Conseil en systèmes et logiciels informatiques'],
    ['code' => '62.02B', 'label' => 'Tierce maintenance de systèmes et d\'applications informatiques'],
    ['code' => '62.03Z', 'label' => 'Gestion d\'installations informatiques'],
    ['code' => '63.11Z', 'label' => 'Traitement de données, hébergement et activités connexes'],
    ['code' => '62.09Z', 'label' => 'Autres activités informatiques'],
    ['code' => '59.14Z', 'label' => 'Projection de films cinématographiques'],
    ['code' => '59.20Z', 'label' => 'Enregistrement sonore et édition musicale'],
    ['code' => '60.10Z', 'label' => 'Édition et diffusion de programmes radio'],
    ['code' => '60.20A', 'label' => 'Édition de chaînes généralistes'],
    ['code' => '60.20B', 'label' => 'Édition de chaînes thématiques'],
    ['code' => '61.10Z', 'label' => 'Télécommunications filaires'],
    ['code' => '61.20Z', 'label' => 'Télécommunications sans fil'],
    ['code' => '61.30Z', 'label' => 'Télécommunications par satellite'],
    ['code' => '61.90Z', 'label' => 'Autres activités de télécommunication'],
    ['code' => '63.91Z', 'label' => 'Activités des agences de presse'],
    ['code' => '63.99Z', 'label' => 'Autres services d\'information n.c.a.'],
    ['code' => '64.11Z', 'label' => 'Activités de banque centrale'],
    ['code' => '64.19Z', 'label' => 'Autres intermédiations monétaires']
];
?>

<p class="title is-2">Recherche d'entreprise</p>
<p class="subtitle is-4">Base de données SIRENE</p>

<div class="box">
    <p class="title is-4">
        Effectuer des recherches pour des stages de SLAM et SISR en dehors de notre site:
    </p>
    <hr>
    <div class="fixed-grid">
        <div class="grid">
            <div class="column">
                <h3 class="title is-4">NAF pour SLAM</h3>
                <table class="table table-striped table-hover tableFilter" id="">
                    <thead>
                        <tr>
                            <th>Sélectionner</th>
                            <th>Code</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($nafTableSLAM as $naf) { ?>
                            <tr onclick="toggleCheckbox(this)">
                                <td>
                                    <input type="checkbox" class="naf-checkbox slam-checkbox" value="<?php echo $naf['code']; ?>">
                                </td>
                                <td><?php echo $naf['code']; ?></td>
                                <td><?php echo $naf['label']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br>
                <button id="generateLinkSLAM" class="button" onclick="generateLink('slam')">
                    <span class="icon">
                        <i class="fas fa-laptop"></i>
                    </span>&nbsp;&nbsp;Recherche
                </button>
            </div>
            <div class="column">
                <h3 class="title is-4">NAF pour SISR</h3>
                <table class="table table-striped table-hover tableFilter" id="">
                    <thead>
                        <tr>
                            <th>Sélectionner</th>
                            <th>Code</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($nafTableSISR as $naf) { ?>
                            <tr onclick="toggleCheckbox(this)">
                                <td>
                                    <input type="checkbox" class="naf-checkbox sisr-checkbox" value="<?php echo $naf['code']; ?>">
                                </td>
                                <td><?php echo $naf['code']; ?></td>
                                <td><?php echo $naf['label']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br>
                <button id="generateLinkSISR" class="button" onclick="generateLink('sisr')">
                    <span class="icon">
                        <i class="fas fa-microchip"></i>
                    </span>&nbsp;&nbsp;Recherche
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleCheckbox(row) {
        const checkbox = row.querySelector('input[type="checkbox"]');
        checkbox.checked = !checkbox.checked;
    }

    function generateLink(type) {
        const checkboxes = document.querySelectorAll(`.${type}-checkbox:checked`);
        const selectedNafs = Array.from(checkboxes).map(cb => cb.value);
        
        const baseUrl = 'https://annuaire-entreprises.data.gouv.fr/rechercher?terme=&cp_dep_label=Charente-Maritime+%2817%29&cp_dep_type=dep&cp_dep=17&fn=&n=&dmin=&dmax=&type=&label=&etat=&sap=&';
        const additionalParams = '&nature_juridique=&tranche_effectif_salarie=&categorie_entreprise=';
        const fullUrl = baseUrl + selectedNafs.map(naf => `naf=${naf}`).join('&') + additionalParams;
        
        window.open(fullUrl, '_blank');
    }
</script>

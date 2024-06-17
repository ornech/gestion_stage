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

?>

<div class="box">
    <hr>
    <p class="subtitle is-4">
        Effectuer des recherches pour des stages de 
        <button id="openModalSLAM" class="button" onclick="openSLAMModal()">
            <span class="icon">
                <i class="fas fa-laptop"></i>
            </span>&nbsp;&nbsp;SLAM
        </button>
        et 
        <button id="openModalSISR" class="button" onclick="openSISRModal()">
            <span class="icon">
                <i class="fas fa-microchip"></i>
            </span>&nbsp;&nbsp;SISR
        </button>
        en dehors de notre site.
    </p>
</div>

<!-- Modal SLAM -->
<div id="modalslam" class="modal">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            <h1 class="title is-4">Sélectionner les NAF pour SLAM</h1>
            <table class="table is-fullwidth">
                <tbody id="naf-table-slam">
                    
                </tbody>
            </table>
            <button class="button is-link" onclick="generateLink('slam')">Rechercher SLAM</button>
            <button class="button" onclick="closeModal('modalslam')">Annuler</button>
        </div>
    </div>
</div>
<!-- Modal SISR-->

<div id="modalsisr" class="modal">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            <h1 class="title is-4">Sélectionner les NAF pour SISR</h1>
            <table class="table is-fullwidth">
                <tbody id="naf-table-sisr">

            </tbody>
            </table>
            <button class="button is-link" onclick="generateLink('sisr')">Rechercher SISR</button>
            <button class="button" onclick="closeModal('modalsisr')">Annuler</button>
        </div>
    </div>
</div>

<script>
    function openSLAMModal() {
        document.getElementById('modalslam').classList.add('is-active');
        populateNafCheckboxes('naf-table-slam', nafTableSLAM, ['62.01Z', '62.03Z']);
    }

    function openSISRModal() {
        document.getElementById('modalsisr').classList.add('is-active');
        populateNafCheckboxes('naf-table-sisr', nafTableSISR, ['62.02A', '62.02B']);
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.remove('is-active');
    }

    function generateLink(type) {
        const tableId = (type === 'slam') ? 'naf-table-slam' : 'naf-table-sisr';
        const checkboxes = document.querySelectorAll(`#${tableId} .naf-checkbox:checked`);
        const selectedNafs = Array.from(checkboxes).map(cb => cb.value);
        
        const baseUrl = 'https://annuaire-entreprises.data.gouv.fr/rechercher?terme=&cp_dep_label=Charente-Maritime+%2817%29&cp_dep_type=dep&cp_dep=17&fn=&n=&dmin=&dmax=&type=&label=&etat=&sap=&naf=';
        const additionalParams = '&nature_juridique=&tranche_effectif_salarie=&categorie_entreprise=';
        const fullUrl = baseUrl + selectedNafs.join('&naf=') + additionalParams;
        
        window.open(fullUrl, '_blank');
    }

    function populateNafCheckboxes(tableId, nafData, selectedNafs) {
        const nafTableBody = document.getElementById(tableId);
        nafTableBody.innerHTML = '';
        
        nafData.forEach(naf => {
            const isChecked = selectedNafs.includes(naf.code) ? 'checked' : '';
            const row = document.createElement('tr');
            row.innerHTML = `
                <td><input type="checkbox" class="naf-checkbox" value="${naf.code}" ${isChecked}></td>
                <td>${naf.label}</td>
            `;
            nafTableBody.appendChild(row);
        });
    }

    const nafTableSLAM = [
        {code: '62.01Z', label: 'Programmation informatique'},
        {code: '63.12Z', label: 'Portails Internet'},
        {code: '62.09Z', label: 'Autres activités informatiques'},
    ];

    const nafTableSISR = [
        {code: '62.02A', label: 'Conseil en systèmes et logiciels informatiques'},
        {code: '62.02B', label: 'Tierce maintenance de systèmes et d\'applications informatiques'},
        {code: '62.03Z', label: 'Gestion d\'installations informatiques'},
    ];
</script>

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


// https://annuaire-entreprises.data.gouv.fr
// /rechercher?terme=&cp_dep_label=&cp_dep_type=&cp_dep=&fn=&n=&dmin=&dmax=&type=&label=&etat=&sap=
// &naf=62.02A&naf=62.03Z&naf=62.01Z&nature_juridique=&tranche_effectif_salarie=&categorie_entreprise=
// ?>


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
<button class="button" type="submit" onclick="generateLinkSLAM()">
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


<section class="section">
        <div class="container">
            <table class="table is-fullwidth">
                <thead>
                    <tr>
                        <th></th>
                        <th>NAF</th>
                    </tr>
                </thead>
                <tbody id="naf-table">
                    <!-- Les lignes de la table seront ajoutées ici par JavaScript -->
                </tbody>
            </table>
            <button class="button is-link" onclick="generateLinkSLAM()">ouvrir</button>

        </div>
    </section>

    <script>
        const nafTable = [
            {code: '59.14Z', label: 'Projection de films cinématographiques'},
            {code: '59.20Z', label: 'Enregistrement sonore et édition musicale'},
            {code: '60.10Z', label: 'Édition et diffusion de programmes radio'},
            {code: '60.20A', label: 'Édition de chaînes généralistes'},
            {code: '60.20B', label: 'Édition de chaînes thématiques'},
            {code: '61.10Z', label: 'Télécommunications filaires'},
            {code: '61.20Z', label: 'Télécommunications sans fil'},
            {code: '61.30Z', label: 'Télécommunications par satellite'},
            {code: '61.90Z', label: 'Autres activités de télécommunication'},
            {code: '62.01Z', label: 'Programmation informatique'},
            {code: '62.02A', label: 'Conseil en systèmes et logiciels informatiques'},
            {code: '62.02B', label: 'Tierce maintenance de systèmes et d\'applications informatiques'},
            {code: '62.03Z', label: 'Gestion d\'installations informatiques'},
            {code: '62.09Z', label: 'Autres activités informatiques'},
            {code: '63.11Z', label: 'Traitement de données, hébergement et activités connexes'},
            {code: '63.12Z', label: 'Portails Internet'},
            {code: '63.91Z', label: 'Activités des agences de presse'},
            {code: '63.99Z', label: 'Autres services d\'information n.c.a.'},
            {code: '64.11Z', label: 'Activités de banque centrale'},
            {code: '64.19Z', label: 'Autres intermédiations monétaires'}
        ];

        const nafTableBody = document.getElementById('naf-table');

        nafTable.forEach(naf => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td><input type="checkbox" class="naf-checkbox" value="${naf.code}"></td>
                <td>${naf.label}</td>
            `;
            nafTableBody.appendChild(row);
        });



        function generateLinkSLAM() {
            const checkboxes = document.querySelectorAll('.naf-checkbox:checked');
            const selectedNafs = Array.from(checkboxes).map(cb => cb.value);
            const baseUrl = 'https://annuaire-entreprises.data.gouv.fr/rechercher?terme=&cp_dep_label=Charente-Maritime+%2817%29&cp_dep_type=dep&cp_dep=17&fn=&n=&dmin=&dmax=&type=&label=&etat=&sap=&naf=';
            const additionalParams = '&nature_juridique=&tranche_effectif_salarie=&categorie_entreprise=';
            const fullUrl = baseUrl + selectedNafs.join('&naf=') + additionalParams;
            window.open(fullUrl, '_blank');
        }
    </script>










<?php echo $resultat; ?>


<script>
document.getElementById('sisrButton').addEventListener('click', function() {
    window.open('https://annuaire-entreprises.data.gouv.fr/rechercher?terme=&cp_dep_label=Charente-Maritime+%2817%29&cp_dep_type=dep&cp_dep=17&fn=&n=&dmin=&dmax=&type=&label=&etat=&sap=&naf=62.02A&nature_juridique=&tranche_effectif_salarie=&categorie_entreprise=', '_blank');
});
function openSLAM() {
    window.open('https://annuaire-entreprises.data.gouv.fr/rechercher?terme=&cp_dep_label=Charente-Maritime+%2817%29&cp_dep_type=dep&cp_dep=17&fn=&n=&dmin=&dmax=&type=&label=&etat=&sap=&naf=62.01Z&nature_juridique=&tranche_effectif_salarie=&categorie_entreprise=', '_blank');
}

</script>
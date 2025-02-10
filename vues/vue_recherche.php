<?php
require_once 'config/auth.php';
include 'vues/var_data.php';

$nafTable = [


    ["code" => "77.33Z", "label" => "Location et location-bail de machines de bureau et de matériel informatique"],
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
    ['code' => '63.99Z', 'label' => 'Autres services d\'information n.c.a.'],
    ['code' => '64.11Z', 'label' => 'Activités de banque centrale'],
    ['code' => '64.19Z', 'label' => 'Autres intermédiations monétaires'],
    ["code" => "58.21Z", "label" => "Édition de jeux électroniques"],
    ["code" => "58.29A", "label" => "Édition de logiciels système et de réseau"],
    ["code" => "58.29B", "label" => "Édition de logiciels outils de développement et de langages"],
    ["code" => "58.29C", "label" => "Édition de logiciels applicatifs"],
    ["code" => "47.41Z", "label" => "Commerce de détail d'ordinateurs, d'unités périphériques et de logiciels en magasin spécialisé"],
    ["code" => "46.51Z", "label" => "Commerce de gros d'ordinateurs, d'équipements informatiques périphériques et de logiciels"],
    ["code" => "95.11Z", "label" => "Réparation d'ordinateurs et d'équipements périphériques"]
];
?>

<p class="title is-2">Recherche d'entreprise</p>
<p class="subtitle is-4">Base de données SIRENE</p>

<div class="container">
    <div class="columns is-vcentered">
        <div class="column is-half">
            <p class="subtitle is-4">
                Pré-sélections pour <button id="selectSLAM" class="button" onclick="selectNaf('slam')"><span class="icon">
                        <i class="fas fa-laptop"></i>
                    </span>&nbsp;&nbsp;SLAM</button> ou <button id="selectSISR" class="button" onclick="selectNaf('sisr')"><span class="icon">
                        <i class="fas fa-microchip"></i>
                    </span>&nbsp;&nbsp;SISR
                </button>
            </p>
        </div>
        <div class="column is-half has-text-right">
            <div class="field is-grouped">
                <div class="control">
                    <div class="select">
                        <select id="departements" name="departements">
                            <option value="Ain+(01)">Ain (01)</option>
                            <option value="Aisne+(02)">Aisne (02)</option>
                            <option value="Allier+(03)">Allier (03)</option>
                            <option value="Alpes-de-Haute-Provence+(04)">Alpes-de-Haute-Provence (04)</option>
                            <option value="Hautes-Alpes+(05)">Hautes-Alpes (05)</option>
                            <option value="Alpes-Maritimes+(06)">Alpes-Maritimes (06)</option>
                            <option value="Ardèche+(07)">Ardèche (07)</option>
                            <option value="Ardennes+(08)">Ardennes (08)</option>
                            <option value="Ariège+(09)">Ariège (09)</option>
                            <option value="Aube+(10)">Aube (10)</option>
                            <option value="Aude+(11)">Aude (11)</option>
                            <option value="Aveyron+(12)">Aveyron (12)</option>
                            <option value="Bouches-du-Rhône+(13)">Bouches-du-Rhône (13)</option>
                            <option value="Calvados+(14)">Calvados (14)</option>
                            <option value="Cantal+(15)">Cantal (15)</option>
                            <option value="Charente+(16)">Charente (16)</option>
                            <option value="Charente-Maritime+(17)" selected>Charente-Maritime (17)</option>
                            <option value="Cher+(18)">Cher (18)</option>
                            <option value="Corrèze+(19)">Corrèze (19)</option>
                            <option value="Corse-du-Sud+(2A)">Corse-du-Sud (2A)</option>
                            <option value="Haute-Corse+(2B)">Haute-Corse (2B)</option>
                            <option value="Côte-d'Or+(21)">Côte-d'Or (21)</option>
                            <option value="Côtes-d'Armor+(22)">Côtes-d'Armor (22)</option>
                            <option value="Creuse+(23)">Creuse (23)</option>
                            <option value="Dordogne+(24)">Dordogne (24)</option>
                            <option value="Doubs+(25)">Doubs (25)</option>
                            <option value="Drôme+(26)">Drôme (26)</option>
                            <option value="Eure+(27)">Eure (27)</option>
                            <option value="Eure-et-Loir+(28)">Eure-et-Loir (28)</option>
                            <option value="Finistère+(29)">Finistère (29)</option>
                            <option value="Gard+(30)">Gard (30)</option>
                            <option value="Haute-Garonne+(31)">Haute-Garonne (31)</option>
                            <option value="Gers+(32)">Gers (32)</option>
                            <option value="Gironde+(33)">Gironde (33)</option>
                            <option value="Hérault+(34)">Hérault (34)</option>
                            <option value="Ille-et-Vilaine+(35)">Ille-et-Vilaine (35)</option>
                            <option value="Indre+(36)">Indre (36)</option>
                            <option value="Indre-et-Loire+(37)">Indre-et-Loire (37)</option>
                            <option value="Isère+(38)">Isère (38)</option>
                            <option value="Jura+(39)">Jura (39)</option>
                            <option value="Landes+(40)">Landes (40)</option>
                            <option value="Loir-et-Cher+(41)">Loir-et-Cher (41)</option>
                            <option value="Loire+(42)">Loire (42)</option>
                            <option value="Haute-Loire+(43)">Haute-Loire (43)</option>
                            <option value="Loire-Atlantique+(44)">Loire-Atlantique (44)</option>
                            <option value="Loiret+(45)">Loiret (45)</option>
                            <option value="Lot+(46)">Lot (46)</option>
                            <option value="Lot-et-Garonne+(47)">Lot-et-Garonne (47)</option>
                            <option value="Lozère+(48)">Lozère (48)</option>
                            <option value="Maine-et-Loire+(49)">Maine-et-Loire (49)</option>
                            <option value="Manche+(50)">Manche (50)</option>
                            <option value="Marne+(51)">Marne (51)</option>
                            <option value="Haute-Marne+(52)">Haute-Marne (52)</option>
                            <option value="Mayenne+(53)">Mayenne (53)</option>
                            <option value="Meurthe-et-Moselle+(54)">Meurthe-et-Moselle (54)</option>
                            <option value="Meuse+(55)">Meuse (55)</option>
                            <option value="Morbihan+(56)">Morbihan (56)</option>
                            <option value="Moselle+(57)">Moselle (57)</option>
                            <option value="Nièvre+(58)">Nièvre (58)</option>
                            <option value="Nord+(59)">Nord (59)</option>
                            <option value="Oise+(60)">Oise (60)</option>
                            <option value="Orne+(61)">Orne (61)</option>
                            <option value="Pas-de-Calais+(62)">Pas-de-Calais (62)</option>
                            <option value="Puy-de-Dôme+(63)">Puy-de-Dôme (63)</option>
                            <option value="Pyrénées-Atlantiques+(64)">Pyrénées-Atlantiques (64)</option>
                            <option value="Hautes-Pyrénées+(65)">Hautes-Pyrénées (65)</option>
                            <option value="Pyrénées-Orientales+(66)">Pyrénées-Orientales (66)</option>
                            <option value="Bas-Rhin+(67)">Bas-Rhin (67)</option>
                            <option value="Haut-Rhin+(68)">Haut-Rhin (68)</option>
                            <option value="Rhône+(69)">Rhône (69)</option>
                            <option value="Haute-Saône+(70)">Haute-Saône (70)</option>
                            <option value="Saône-et-Loire+(71)">Saône-et-Loire (71)</option>
                            <option value="Sarthe+(72)">Sarthe (72)</option>
                            <option value="Savoie+(73)">Savoie (73)</option>
                            <option value="Haute-Savoie+(74)">Haute-Savoie (74)</option>
                            <option value="Paris+(75)">Paris (75)</option>
                            <option value="Seine-Maritime+(76)">Seine-Maritime (76)</option>
                            <option value="Seine-et-Marne+(77)">Seine-et-Marne (77)</option>
                            <option value="Yvelines+(78)">Yvelines (78)</option>
                            <option value="Deux-Sèvres+(79)">Deux-Sèvres (79)</option>
                            <option value="Somme+(80)">Somme (80)</option>
                            <option value="Tarn+(81)">Tarn (81)</option>
                            <option value="Tarn-et-Garonne+(82)">Tarn-et-Garonne (82)</option>
                            <option value="Var+(83)">Var (83)</option>
                            <option value="Vaucluse+(84)">Vaucluse (84)</option>
                            <option value="Vendée+(85)">Vendée (85)</option>
                            <option value="Vienne+(86)">Vienne (86)</option>
                            <option value="Haute-Vienne+(87)">Haute-Vienne (87)</option>
                            <option value="Vosges+(88)">Vosges (88)</option>
                            <option value="Territoire de Belfort+(90)">Territoire de Belfort (90)</option>
                            <option value="Essonne+(91)">Essonne (91)</option>
                            <option value="Hauts-de-Seine+(92)">Hauts-de-Seine (92)</option>
                            <option value="Seine-Saint-Denis+(93)">Seine-Saint-Denis (93)</option>
                            <option value="Val-de-Marne+(94)">Val-de-Marne (94)</option>
                            <option value="Val-d'Oise+(95)">Val-d'Oise (95)</option>
                            <option value="Guadeloupe+(971)">Guadeloupe (971)</option>
                            <option value="Martinique+(972)">Martinique (972)</option>
                            <option value="Guyane+(973)">Guyane (973)</option>
                            <option value="La Réunion+(974)">La Réunion (974)</option>
                            <option value="Mayotte+(976)">Mayotte (976)</option>
                        </select>
                    </div>
                </div>
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

    <div class="message is-info">
        <div class="message-body">
            <p>
                Pour sélectionner les éléments pertinents à la spécialité SLAM ou SISR,
                cliquez sur les boutons correspondants en haut, puis appuyez sur le bouton "Rechercher"
                pour continuer. Vous avez également la possibilité de modifier et d'ajouter d'autres options
                selon vos besoins. Assurez-vous de vérifier la localisation choisie avant de procéder.
            </p>
        </div>
    </div>


    <div class="columns">
        <div class="column is-half">
            <?php
            $halfCount = ceil(count($nafTable) / 2);

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

</div>


<script>
    function toggleCheckbox(row) {
        const checkbox = row.querySelector('input[type="checkbox"]');
        checkbox.checked = !checkbox.checked;
    }

    function selectNaf(type) {
        const checkboxes = document.querySelectorAll('.naf-checkbox');
        checkboxes.forEach(checkbox => {
            if (type === 'slam' && (checkbox.value === '62.01Z' || checkbox.value === '63.12Z' || checkbox.value === '62.02A' ||
                    checkbox.value === '62.02B' || checkbox.value === '62.09Z' || checkbox.value === '63.11Z' ||
                    checkbox.value === '63.99Z' || checkbox.value === '58.21Z' || checkbox.value === '58.29A' ||
                    checkbox.value === '58.29B' || checkbox.value === '58.29C')) {
                checkbox.checked = true;


            } else if (type === 'sisr' && (checkbox.value === '77.33Z' || checkbox.value === '61.10Z' ||
                    checkbox.value === '61.20Z' || checkbox.value === '61.30Z' || checkbox.value === '61.90Z' ||
                    checkbox.value === '62.02A' || checkbox.value === '62.02B' || checkbox.value === '62.03Z' ||
                    checkbox.value === '62.09Z' || checkbox.value === '63.99Z' || checkbox.value === '64.11Z' ||
                    checkbox.value === '64.19Z' || checkbox.value === '47.41Z' || checkbox.value === '46.51Z' || checkbox.value === '95.11Z')) {
                checkbox.checked = true;
            } else {
                checkbox.checked = false;
            }
        });
    }

    function generateLink() {
        const checkboxes = document.querySelectorAll('.naf-checkbox:checked');
        const selectedNafs = Array.from(checkboxes).map(cb => cb.value);

        const departementSelect = document.getElementById('departements');
        const selectedDepartement = departementSelect.value;
        const departementLabel = departementSelect.options[departementSelect.selectedIndex].text;

        const departementCode = selectedDepartement.substring(selectedDepartement.indexOf('(') + 1, selectedDepartement.indexOf(')'));

        const baseUrl = 'https://annuaire-entreprises.data.gouv.fr/rechercher';

        const fullUrl = `${baseUrl}?terme=&cp_dep_label=${encodeURIComponent(departementLabel)}%20&cp_dep_type=dep&cp_dep=${encodeURIComponent(departementCode)}&${selectedNafs.map(naf => `naf=${naf}`).join('&')}&fn=&n=&dmin=&dmax=&type=&label=&etat=&sap=`;

        window.open(fullUrl, '_blank');
    }
</script>

<style>

    .naf-checkbox:checked + label {
        padding: 3px;
        border-radius: 5px;
        font-weight: bold;
        text-decoration: underline
    }

</style>
    
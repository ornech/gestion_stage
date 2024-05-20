<?php
require_once 'config/auth.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des entreprises</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Liste des entreprises</h2>
    <p><a href="router.php?page=create_entreprise" class="btn btn-success" role="button">Ajouter une entreprise</a></p>

    <table id="maTable">
        <thead>
            <tr>
                <?php
                // Liste des colonnes du tableau
                $entreprise_tableau = [
                    'nomEntreprise' => 'nomEntreprise',
                    'adresse' => 'adresse',
                    'ville' => 'ville',
                    'type' => 'type',
                    'codePostal' => 'codePostal'
                ];

                // Fonction pour récupérer les valeurs uniques d'une colonne
                function uniqueValues($entreprises, $column) {
                    $values = [];
                    foreach ($entreprises as $entreprise) {
                        if (isset($entreprise->$column)) {
                            $values[] = $entreprise->$column;
                        }
                    }
                    return array_unique($values);
                }

                // Générer les filtres personnalisés pour chaque colonne
                $filters = [];
                foreach ($entreprise_tableau as $column => $value) {
                    $filters[$column] = uniqueValues($entreprises, $column);
                }

                // Affichage des filtres et des options de tri
                $n = 0;
                foreach ($entreprise_tableau as $column => $value) {
                    echo '<th>';
                    echo '<label class="small" for="' . $column . '_filtre">Filtrer</label>';
                    echo '<input id="' . $column . '_filtre" value="" onkeyup="searchInColumn(this, ' . $n . ')" class="form-control form-control-sm">';

                    echo '<select id="' . $column . '_filtre" onchange="applyFilter(this.value, \'' . $column . '\')" class="form-select form-select-sm">';
                    echo '<option value="">Tout afficher</option>';
                    foreach ($filters[$column] as $filter) {
                        echo '<option value="' . htmlspecialchars($filter) . '">' . htmlspecialchars($filter) . '</option>';
                    }

                    echo '</select>';
                    echo '<label class="small" for="' . $column . '_trie">Trier</label>';
                    echo '<select id="' . $column . '_trie" onchange="sortTable(' . $n . ', this.value)" class="form-select form-select-sm">';
                    echo '<option value="">---</option>';
                    echo '<option value="asc">Croissant</option>';
                    echo '<option value="desc">Décroissant</option>';
                    echo '</select>';
                    echo '</th>';
                    $n++;
                }
                ?>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entreprises as $entreprise): ?>
                <tr>
                    <td><?= htmlspecialchars($entreprise->nomEntreprise) ?></td>
                    <td><?= htmlspecialchars($entreprise->adresse) ?></td>
                    <td><?= htmlspecialchars($entreprise->ville) ?></td>
                    <td><?= htmlspecialchars($entreprise->type) ?></td>
                    <td><?= htmlspecialchars($entreprise->codePostal) ?></td>
                    <td>
                        <a href="router.php?page=modifier_entreprise&idEntreprise=<?= $entreprise->id ?>">Modifier</a> &nbsp;
                        <a href="router.php?page=fiche_entreprise&idEntreprise=<?= $entreprise->id ?>">voir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        // Fonction pour appliquer un filtre sur une colonne
        function applyFilter(value, column) {
            var table = document.querySelector('table');
            var rows = table.getElementsByTagName('tr');
            for (var i = 1; i < rows.length; i++) {
                var row = rows[i];
                var cells = row.getElementsByTagName('td');
                var cell = Array.from(cells).find(cell => cell.innerText === value);
                row.style.display = (value === '' || cell) ? '' : 'none';
            }
        }

        // Fonction pour appliquer un tri sur une colonne
        function sortTable(n, order) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("maTable");
            switching = true;
            dir = order;

            while (switching) {
                switching = false;
                rows = Array.from(table.rows).filter(row => row.style.display !== "none");

                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];

                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount++;
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }

        // Fonction pour rechercher dans une colonne
        function searchInColumn(input, columnIndex) {
            var filter = input.value.toLowerCase();
            var table = document.getElementById("maTable");
            var rows = table.getElementsByTagName("tr");

            for (var i = 1; i < rows.length; i++) {
                var row = rows[i];
                var cell = row.getElementsByTagName("td")[columnIndex];
                if (cell) {
                    var txtValue = cell.textContent || cell.innerText;
                    row.style.display = txtValue.toLowerCase().indexOf(filter) > -1 ? "" : "none";
                }
            }
        }
    </script>
</body>
</html>

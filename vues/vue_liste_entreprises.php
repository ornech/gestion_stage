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
  <p class="title is-2">Annuaire entreprises</p>
  <p class="subtitle is-4">Entreprises qui ont été démarchées ou qui ont acceuillies des stagiaires.</p>
    <table class="table tableFilter" id="maTable">
        <thead>
            <tr>
                <?php
                // Liste des colonnes du tableau
                $entreprise_tableau = [
                    "Nom entreprise" => "nomEntreprise",
                    "Adresse" => "adresse",
                    'Ville' => "ville",
                    'Type' => "type",
                    'Code postal' => "codePostal"
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
                foreach ($entreprise_tableau as $column) {
                    $filters[$column] = uniqueValues($entreprises, $column);
                }

                // Affichage des filtres et des options de tri
                $n = 0;
                foreach ($entreprise_tableau as $column => $value) {
                    echo '<td class="lineFilter" name="'. $column .'">';

                    echo '</td>';
                    $n++;
                }
                ?>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($entreprises as $entreprise): ?>
                <tr>
                    <td><a href="router.php?page=fiche_entreprise&idEntreprise=<?= $entreprise->id ?>"><?= htmlspecialchars($entreprise->nomEntreprise) ?></a></td>
                    <td><?= $entreprise->adresse != null ? htmlspecialchars($entreprise->adresse) : "Non défini" ?></td>
                    <td><?= $entreprise->ville != null ? htmlspecialchars($entreprise->ville) : "Non défini" ?></td>
                    <td><?= $entreprise->type != null ? htmlspecialchars($entreprise->type) : "Non défini" ?></td>
                    <td><?= $entreprise->codePostal != null ? htmlspecialchars($entreprise->codePostal) : "Non défini"?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

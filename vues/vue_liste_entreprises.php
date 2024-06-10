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
  <div class="field is-grouped is-grouped-multiline is-flex ">

    <div class="control">
  <div class="tags has-addons is-large">
    <span class="tag is-dark">Entreprises</span>
    <span class="tag is-link"><?= "<b>" . count((array)$entreprises) . "</b>" ?></span>
  </div>
</div>

  <table class="table tableFilter" id="maTable">
        <thead>
            <tr>
              <td></td>
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

                // Détermination de la couleur RGB
                function couleurDegrade($pourcentage) {
                    if ($pourcentage <= 0.5) {
                        // Transition du vert à l'orange
                        $r = (int)(255 * ($pourcentage / 0.5));
                        $g = 255;
                        $b = 0;
                    } else {
                        // Transition de l'orange au rouge
                        $r = 255;
                        $g = (int)(255 * ((1 - $pourcentage) / 0.5));
                        $b = 0;
                    }

                    // Conversion en hexadécimal
                    return sprintf("#%02x%02x%02x", $r, $g, $b);
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
                    <td> <?php
                    // Comptage du nombre total de champs

                    $tableau = (array)$entreprise;
                    // Comptage du nombre total de champs
                    $nombre_champs_total = count($tableau);

                    // Utilisation de array_filter pour filtrer les champs vides
                    $champs_vides = array_filter($tableau, function($valeur) {
                        return $valeur === '' || $valeur === null;
                    });

                    // Comptage des champs vides
                    $nombre_champs_vides = count($champs_vides);

                    // Calcul du pourcentage de champs vides
                    $pourcentage_vide = $nombre_champs_vides / $nombre_champs_total;

                    // Calcul de la couleur en fonction du pourcentage de champs vides
                    $couleur = couleurDegrade($pourcentage_vide);


                    // Affichage des résultats
                    echo "<i class='fa fa-circle' style='color:$couleur'></i> "; // . ceil($pourcentage_vide * 100) . "%" ;

                    ?> </td>
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

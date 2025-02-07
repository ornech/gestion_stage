<?php
require_once 'config/auth.php';
include_once 'model/Stage.php'; // Inclure le modèle Stage
$stageModel = new Stage($conn);
?>

<div class="notification is-primary" id="EntrepriseSuccess" style="display: none;">
  <p class="title is-4">Entreprise créé avec succès</p>
  <p>L'entreprise a été créée avec succès et est actuellement en cours de validation.</p>
  <p>Elle sera visible dès sa validation.</p>
</div>

<p class="title is-2">Annuaire entreprises</p>
<p class="subtitle is-4">Entreprises qui ont été démarchées ou qui ont accueilli des stagiaires.</p>
<div class="field is-grouped is-grouped-multiline is-flex ">

<div class="field is-grouped is-grouped-multiline">
  <div class="control">
    <div class="tags has-addons is-small">
      <span class="tag is-dark">Entreprises:</span>
      <span class="tag is-link"><?= "<b>" . count($entreprises) . "</b>" ?></span>
    </div>
  </div>
  <div class="control">
    <div class="tags has-addons is-small">
      <span class="tag is-dark">Stages :</span>
      <span class="tag is-success"><?= "<b>" . count($stages) . "</b>" ?></span>
    </div>
  </div>
  <div class="control">
    <div class="tags has-addons is-small">
      <span class="tag is-dark">Contacts :</span>
      <span class="tag is-warning"><?= "<b>" . count($contacts) . "</b>" ?></span>
    </div>
  </div>
</div>

<table class="table tableFilter" id="maTable">
  <thead>
    <tr>
      <?php
      // Liste des colonnes du tableau
      $entreprise_tableau = [
          "Nom entreprise" => "nomEntreprise",
          "Adresse" => "adresse",
          'Ville' => "ville",
          'naf' => "naf",
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

      // Affichage des filtres et des options de tri
      $n = 0;
      foreach ($entreprise_tableau as $column => $value) {
          echo '<td class="lineFilter" name="'. $column .'">';

          echo '</td>';
          $n++;
      }
      ?>
      <td class="lineFilter codePostal" name="Code postal"></td>
      <td>Stage</td>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($entreprises as $entreprise): ?>
    <tr>
      <td class="entreprise">
        <?php
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
        echo "<i class='fa fa-circle' style='color:$couleur'></i> "; // . ceil($pourcentage_vide * 100) . "%" ;?>
        &nbsp;<a href="router.php?page=fiche_entreprise&idEntreprise=<?= $entreprise->EntrepriseID ?>"><?= htmlspecialchars($entreprise->nomEntreprise) ?></a>
      </td>
      <td class="adresse"><?= $entreprise->adresse != null ? htmlspecialchars($entreprise->adresse) : "Non défini" ?></td>
      <td><?= $entreprise->ville != null ? htmlspecialchars($entreprise->ville) : "Non défini" ?></td>
      <td class="naf"><abbr title="(<?= $entreprise->naf != null ? htmlspecialchars($entreprise->naf) : "Non défini" ?>) <?= $entreprise->naf_libelle != null ? htmlspecialchars($entreprise->naf_libelle) : "Non défini" ?>">(<?= $entreprise->naf != null ? htmlspecialchars($entreprise->naf) : "Non défini" ?>) <?= $entreprise->naf_libelle != null ? htmlspecialchars($entreprise->naf_libelle) : "Non défini" ?></abbr></td>
      <td class="codePostal"><?= $entreprise->codePostal != null ? htmlspecialchars($entreprise->codePostal) : "Non défini"?></td>
      <td>
        <?php
        // Instancier le modèle
        $stages = $stageModel->count_by_entreprise($entreprise->EntrepriseID);

        // Vérifier si le tableau n'est pas vide et contient un objet avec la propriété 'nbr'
        if (isset($stages[0]) && is_object($stages[0]) && property_exists($stages[0], 'nbr')) {
          if ($stages[0]->nbr == "0") {
            echo "-";
          } else {
            ?>
            <div class="control">
              <div class="tags has-addons is-small">
                <span class="tag is-success"><?php echo "<b>" . $stages[0]->nbr . "</b>"; ?></span>
              </div>
            </div>
            <?php
          }
        } else {
          echo "Aucun stage trouvé";
        }
        ?>
      </td>


    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    if (window.location.hash.endsWith("entrepriseSuccess")) {
      document.getElementById('EntrepriseSuccess').style.display = 'block';
    }
  });
</script>

<style>

  .naf{
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    text-wrap: nowrap;
    max-width: clamp(100px, 20vw, 300px);
  }

  .lineFilter{
    overflow: visible !important;
  }

  @media (max-width: 860px) {

    .naf{
      max-width: clamp(100px, 30vw);
    }
    .codePostal{
      display: none;
    }    
  }

</style>
<?php
require_once 'config/auth.php';
?>

<?php
// Vérifier si les détails de l'entreprise sont disponibles
if($ficheEntreprise) {
  // Afficher les détails de l'entreprise
  ?>
  <p class="title is-2"><?= $ficheEntreprise->nomEntreprise ?></p>

  <div class="container">
    <div class="fixed-grid">
      <div class="grid">

        <div class="cell">
          <div class="box">
            <p >
              <?= $ficheEntreprise->adresse ?><br>
              <?= $ficheEntreprise->codePostal ?> <?= $ficheEntreprise->ville ?>
            </p>
            <p><strong>Activité</strong> <?= $ficheEntreprise->naf ?></p>
            <p><strong>type: </strong> <?= $ficheEntreprise->type ?></p>
            <p><strong>Effectif: </strong> <?= $ficheEntreprise->effectif ?></p>
            <p><strong>Siret: </strong><?= $ficheEntreprise->siret ?></p>
            <p><strong>Ajouté par: </strong> <?= $ficheEntreprise->Created_User ?></p>
          </div>
        </div>


        <div class="cell">
          <div class="box">
            <iframe width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=500&amp;height=400&amp;hl=en&amp;q=<?= $ficheEntreprise->adresse, $ficheEntreprise->ville; ?>+()&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe> <a href='http://maps-generator.com/fr'>Maps Generator FR</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=9c9c1fccad93b580a064555d49b07ca94b2880c6'></script>

          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="box">
    <?php
    include 'vues/vue_contact_list.php';
    ?>
  </div>
  <div class="box">
    <p class="title is-6">Stages</p>

    <?php
    echo "<a href='router.php?page=stage_create&idEntreprise=" . $ficheEntreprise->EntrepriseID . "'>Ajouter un stage</a>";
  } else {
    // Si aucune entreprise n'a été trouvée, afficher un message d'erreur
    echo "<p>Aucune entreprise trouvée avec cet identifiant.</p>";
  }
  ?>



</div>
</div>

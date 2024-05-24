<?php
require_once 'config/auth.php';
?>
<style>
  h2 {
    text-align: center;
    position: relative;
  }

  h2::after {
    content: "";
    display: block;
    width: 50%;
    height: 2px;
    background-color: #ADD8E6; /* Couleur bleu clair */
    margin: 10px auto 0;
  }
</style>

<?php
  // Vérifier si les détails de l'entreprise sont disponibles
  if($ficheEntreprise) {
  // Afficher les détails de l'entreprise
?>

<br>
<h2>
  <?= $ficheEntreprise->nomEntreprise ?>
</h2>

<div class="container">
  <div class="row">

    <div class="col-sm-5 col-md-6">
      <p><strong><?= $ficheEntreprise->nomEntreprise ?></strong></p>
      <p>
        <?= $ficheEntreprise->adresse ?>
        <br>
        <?= $ficheEntreprise->codePostal ?> <?= $ficheEntreprise->ville ?>
      </p>
      <p><strong>Siret: </strong><?= $ficheEntreprise->siret ?></p>
      <p><strong>Activité</strong> <?= $ficheEntreprise->naf ?></p>
      <p><strong>Effectif: </strong> <?= $ficheEntreprise->effectif ?></p>
      <p><strong>Ajouté par: </strong> <?= $ficheEntreprise->Created_User ?></p>
    </div>

    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0"><iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=500&amp;height=400&amp;hl=en&amp;q=<?= $ficheEntreprise->adresse, $ficheEntreprise->ville; ?>+()&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe> <a href='http://maps-generator.com/fr'>Maps Generator FR</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=9c9c1fccad93b580a064555d49b07ca94b2880c6'></script></div>
  
    <?php
      echo "<a href='router.php?page=stage_create&idEntreprise=" . $ficheEntreprise->EntrepriseID . "'>Ajouter un stage</a>";
      } else {
        // Si aucune entreprise n'a été trouvée, afficher un message d'erreur
        echo "<p>Aucune entreprise trouvée avec cet identifiant.</p>";
      }
    ?>
  
  </div>
</div>

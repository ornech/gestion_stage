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
    <p><a href='router.php?page=contact_create&idEntreprise=<?= $_GET["idEntreprise"] ?>'>
    <button type='button' class='button'>Ajouter un contact</button>
  </a></p>
  </div>

<!-- -------------------------------------------------------------------------------- -->

<?php
if (isset($contact)){
  echo "<a href='router.php?page=stage_create&idEntreprise=" . $ficheEntreprise->EntrepriseID .
  "'><button type='button' class='button'>Ajouter un stage</button></a>";
}
else{
   ?>
<div class="notification is-warning is-light">
  Si vous possédez une <strong>convention de stage</strong> avec cette entreprise, ajoutez le contact qui a signé votre convention<BR>
  Vous serez ensuite autorisé à enregistrer votre stage depuis cette page.
</div>

<?php
}

if(isset($stages[0])) {


       ?>
  <div class="box">
    <p class="title is-6">Stages</p>

    <table class="table is-fullwidth tableFilter" id="maTable">
    <thead>
      <tr>
        <th>Etudiant</th>
        <th>Classe</th>
        <th>Date début</th>
        <th>Date fin</th>
        <th>Maitre de stage</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($stages as $stage): ?>
          <tr>
            <td><a href="../router.php?page=view_profil&id=<?= $stage->idEtudiant ?>"><?=
            $stage->EtudiantNom  ?> <?= $stage->EtudiantPrenom ?> </a></td>
            <td><?= $stage->classe ? $stage->classe : "-" ?></td>
            <td><?= $stage->dateDebut ? $stage->dateDebut : "-" ?></td>
            <td><?= $stage->dateFin ? $stage->dateFin : "-" ?></td>
            <td>
              <a href="../router.php?page=Contact_fiche&idContact=<?= $stage->idMaitreDeStage ?>"><?= $stage->employe_nom . " " . $stage->employe_prenom ?></a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <?php

        }}
  else {
    // Si aucune entreprise n'a été trouvée, afficher un message d'erreur
    echo "<p>Aucune entreprise trouvée avec cet identifiant.</p>";
  }
  ?>



</div>
</div>

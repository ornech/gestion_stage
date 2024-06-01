<?php
require_once 'config/auth.php';
?>
<BR>
  <?php
  // Vérifier si les données sont disponibles
  if($ContactFiche) {

    ?>
    <p class="title is-2">Annuaire entreprise</p>

    <div class="column is-three-fifths is-offset-one-fifth">

      <div class="card">
        <header class="card-header">
            <p class="subtitle is-2"><i class="fa fa-address-book"></i> <?= $ContactFiche->nom ?> <?= $ContactFiche->prenom ?></p>
        </header>
        <div class="card-content">
            <div class="content">
              <p class="subtitle is-5">Fonction <strong> <?= $ContactFiche->fonction ?></strong></p>
              <p class="subtitle is-5">Service <strong> <?= $ContactFiche->service ?></strong></p>
              <p class="subtitle is-5">Mail <strong> <?= $ContactFiche->email ?></strong></p>
              <p class="subtitle is-5">Tel <strong><?= $ContactFiche->telephone ?></strong></p>

            </div>

            <div class="content">
              <u>Entreprise</u><BR>
              <a href="../router.php?page=fiche_entreprise&idEntreprise=<?= $ContactFiche->EntrepriseID ?>"><?= $ContactFiche->entreprise ?></a><BR>
              <?= $ContactFiche->Entreprise_adresse ?><BR>
              <?= $ContactFiche->Entreprise_codePostal ?> <?= $ContactFiche->Entreprise_ville ?><BR>
            </div>
          </div>
          <footer class="card-footer">
            <a href="#" class="card-footer-item">Edit</a>
            <br>

          </footer>
        </div>
        <center>
        <i>Crée par <a href="../router.php?page=view_profil&id=<?= $ContactFiche->UserID ?>"><?= $ContactFiche->Created_User ?></a> le <?= $ContactFiche->Created_date ?></i>
      </center>
      </div>


      <?php
    } else {
      // Si aucune entreprise n'a été trouvée, afficher un message d'erreur
      echo "<p>Aucune donnée disponible</p>";
    }
    ?>

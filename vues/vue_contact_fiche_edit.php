<?php
require_once 'config/auth.php';
?>
<BR>
  <?php
  // Vérifier si les données sont disponibles
  if($ContactFiche) {

    //seul le créateur du contact ou un professeur peut le modifier
    if($ContactFiche->UserID === $_SESSION["userID"] || $_SESSION["statut"]=="Professeur" ){

    ?>
    <p class="title is-2">Annuaire entreprise</p>

    <div class="column is-three-fifths is-offset-one-fifth">
      <form action="../controller/contact_update.php" method="POST">
        <div class="card">
          <header class="card-header">
            <p class="subtitle is-2"><i class="fa fa-address-book"></i> <?= $ContactFiche->nom ?> <?= $ContactFiche->prenom ?></p>
          </header>
          <div class="card-content">
            <div class="content">
              <input type="hidden" name="EmployeID" value="<?= $ContactFiche->EmployeID ?>">
              <p class="subtitle is-5">Fonction <input class="input" type="text" name="fonction" value="<?= $ContactFiche->fonction ?>"></p>
              <p class="subtitle is-5">Service <input class="input" type="text" name="service" value="<?= $ContactFiche->service ?>"></p>
              <p class="subtitle is-5">Mail  <input class="input" type="text" name="email" value="<?= $ContactFiche->email ?>"></p>
              <p class="subtitle is-5">Tel <input class="input" type="text" name="telephone" value="<?= $ContactFiche->telephone ?>"></p>

            </div>

            <div class="content">
              <u>Entreprise</u><BR>
                <a href="../router.php?page=fiche_entreprise&idEntreprise=<?= $ContactFiche->EntrepriseID ?>"><?= $ContactFiche->entreprise ?></a><BR>
                  <?= $ContactFiche->Entreprise_adresse ?><BR>
                    <?= $ContactFiche->Entreprise_codePostal ?> <?= $ContactFiche->Entreprise_ville ?><BR>
                    </div>
                  </div>
                  <footer class="card-footer">
                    <div class="field is-grouped">
                      <input type="submit" value="submit" class="button is-link">

                    </div>
                    <div class="control">
                      <button class="button is-link is-light">Cancel</button>
                    </div>
                  </div>
                  <br>
                </form>
              </footer>
            </div>
            <center>
              <i>Crée par <a href="../router.php?page=view_profil&id=<?= $ContactFiche->UserID ?>"><?= $ContactFiche->Created_User ?></a> le <?= $ContactFiche->Created_date ?></i>
            </center>
          </div>


          <?php
        }
          else {
            echo "Utilisateur non autorisé à modifier ce contact";
          }
        } else {
          // Si aucune entreprise n'a été trouvée, afficher un message d'erreur
          echo "<p>Aucune donnée reçue</p>";
        }
        ?>

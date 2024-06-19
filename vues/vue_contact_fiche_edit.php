<?php
require_once 'config/auth.php';

// Vérifier si les données sont disponibles
if($ContactFiche) {
  //seul le créateur du contact ou un professeur peut le modifier
  if($ContactFiche->UserID === $_SESSION["userID"] || $_SESSION["statut"]=="Professeur" ){?>
    
    <p class="title is-2">Annuaire entreprise</p>

    <div class="column is-three-fifths is-offset-one-fifth">
      <form id="formulaire" action="../controller/contact_update.php" method="POST">
        <div class="card">
          <header class="card-header" style="padding: 10px;">
            <p class="subtitle is-2"><i class="fa fa-address-book"></i> <?= $ContactFiche->nom ?> <?= $ContactFiche->prenom ?></p>
          </header>
          <div class="card-content">
            <div class="content">
              <input type="hidden" name="EmployeID" value="<?= $ContactFiche->EmployeID ?>">
              <p class="subtitle is-5">Fonction <input class="input" type="text" name="fonction" value="<?= $ContactFiche->fonction ?>"></p>
              <p class="subtitle is-5">Service <input class="input" type="text" name="service" value="<?= $ContactFiche->service ?>"></p>
              <p class="subtitle is-5">Mail  <input class="input" id="email" type="email" name="email" value="<?= $ContactFiche->email ?>"></p>
              <p class="subtitle is-5">Tel <input class="input" id="telephone" type="tel" name="telephone" value="<?= $ContactFiche->telephone ?>"></p>

            </div>

            <div class="content">
              <u>Entreprise</u><BR>
                <a href="../router.php?page=fiche_entreprise&idEntreprise=<?= $ContactFiche->EntrepriseID ?>"><?= $ContactFiche->entreprise ?></a><BR>
                  <?= $ContactFiche->Entreprise_adresse ?><BR>
                    <?= $ContactFiche->Entreprise_codePostal ?> <?= $ContactFiche->Entreprise_ville ?><BR>
            </div>
            <div class="buttons">
              <input type="submit" value="Enregistrer" class="button is-link">
              <button id="cancel" class="button is-link is-light">Annuler</button>
            </div>

          </div>
          <div class="card-footer">
            <div class="card-footer-item">
              <i>Crée par <a href="../router.php?page=view_profil&id=<?= $ContactFiche->UserID ?>"><?= $ContactFiche->Created_User ?></a> le <?= $ContactFiche->Created_date ?></i>
            </div>
          </div>
        </div>
      </form>
    </div>
            

    <script>
      // Ajouter un écouteur d'événement pour le formulaire
      document.getElementById('formulaire').addEventListener('submit', function(event) {
        const phoneInput = document.getElementById('telephone').value.trim();
        const emailInput = document.getElementById('email').value.trim();

        // Si le numéro de téléphone est rempli mais invalide, empêcher la soumission du formulaire
        if (phoneInput !== '' && !validatePhoneNumber(phoneInput)) {
            alert('Veuillez entrer un numéro de téléphone français valide.');
            event.preventDefault();
            return;
        }

        // Si l'email est rempli mais invalide, empêcher la soumission du formulaire
        if (emailInput !== '' && !validateEmail(emailInput)) {
            alert('Veuillez entrer une adresse email valide.');
            event.preventDefault();
            return;
        }
      });

      document.getElementById('cancel').addEventListener('click', function(event) {
        event.preventDefault();
        history.back();
      });
    </script>

<?php
  }else {
    echo "Utilisateur non autorisé à modifier ce contact";
  }
} else {
  // Si aucune entreprise n'a été trouvée, afficher un message d'erreur
  echo "<p>Aucune donnée reçue</p>";
}?>

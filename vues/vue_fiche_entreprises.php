<?php
require_once 'config/auth.php';
?>

<?php
// Vérifier si les détails de l'entreprise sont disponibles
  $table_name = "entreprise";

// Vérifier si les détails de l'entreprise sont disponibles
if ($ficheEntreprise) {
  $idEntreprise=$ficheEntreprise-> EntrepriseID;
?>
<style>
.containerr {
  position: fixed;
  top: 12%; 
  left: 2%; 
  z-index: 1;
}

.fixed-button {
  cursor: pointer; 
  background-color: rgba(50, 115, 220, 0.3); /* Fond bleu transparent */
}

.fixed-button .hover-text {
  display: none; /* le texte "Retour" est cachée */
}

.fixed-button:hover .hover-text {
  display: inline-block; 
}

</style>

<div class="containerr">
<button class="button fixed-button" id="buttonRetour" onclick="redirectPageRetour()">
  <span class="icon">
    <i class="fas fa-caret-left"></i>
  </span>
  <span class="hover-text">Retour</span>
</button>
  </div>


<div class="is-flex is-align-items-center">
  <p class="title is-2 nomEntreprise"><?= $ficheEntreprise->nomEntreprise ?></p>
  <?php if ($_SESSION["statut"] == "Professeur"): ?>
  <button style="margin-left: 15px; top: -8px;" id="openModal" for="nomEntreprise" class="button">
    <span class="icon">
      <i class="fas fa-pencil-alt"></i>
    </span>
  </button>
<?php endif; ?>

</div>

<div class="notification is-primary" id="ContactSuccess" style="display: none;">
  <p class="title is-4">Contact créé avec succès</p>
  <p>Le contact a été créé avec succès et est actuellement en attente de validation.</p>
  <p>Il sera visible dès sa validation.</p>
</div>

<div class="field is-grouped is-grouped-multiline is-flex ">
  <div class="control">
    <div class="tags has-addons is-medium">
      <span class="tag is-dark">Contacts</span>
      <span class="tag is-link"><?= "<b>" . count((array)$contacts) . "</b>" ?></span>
    </div>
  </div>
  <div class="control">
    <div class="tags has-addons is-medium">
      <span class="tag is-dark">Stages</span>
      <span class="tag is-warning"><?= "<b>" . count((array)$stages) . "</b>" ?></span>
    </div>
  </div>
</div>

<div class="container">
  <div class="columns is-full">
    <div class="column">
      <div class="box">
        <p class="is-size-4">
          <?= $ficheEntreprise->adresse ?><br>
          <?= $ficheEntreprise->codePostal ?> <?= $ficheEntreprise->ville ?>
        </p>
        <br>
        <p><strong>Activité</strong> (<?= $ficheEntreprise->naf ?>) <?= $ficheEntreprise->naf_libelle ?></p>
        <p><strong>type: </strong> <?= $ficheEntreprise->type ?></p>
        <p><strong>Effectif: </strong> <?= $ficheEntreprise->effectif ?></p>
        <p><strong>Siret: </strong><?= $ficheEntreprise->siret ?></p>

        <?php if ($_SESSION["statut"] == "Professeur"): ?>
          <hr>
          <div class="field is-grouped">
            <div class="control">
              <?php if($ficheEntreprise->siret):?>
                <form action="../controller/api_update.php" method="POST" style="display:inline;">
                  <input type="hidden" name="EntrepriseID" value="<?=$ficheEntreprise->EntrepriseID?>">
                  <button type="submit" id="EntrepriseID" class="button is-link is-light" name="submit">Mettre à jour (API)</button>
                </form>
              <?php else:?>
                <button class="button is-link is-light" id="openModal" for="updateModal">Mettre à jour (API)</button>
              <?php endif;?>

              <?php if (!(isset($stages[0]) || isset($contacts[0]))): ?>
                <button id="openModal" for="modalSupprimer" type="button" class="button is-danger">Supprimer&nbsp;<p class="icon"><i class="fas fa-trash-alt"></i></p></button>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="column">
      <div class="box">
        <iframe width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=500&amp;height=400&amp;hl=en&amp;q=<?= $ficheEntreprise->adresse, $ficheEntreprise->ville; ?>+()&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe> <a href='http://maps-generator.com/fr'>Maps Generator FR</a>
        <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=9c9c1fccad93b580a064555d49b07ca94b2880c6'></script>
      </div>
    </div>
  </div>

  <?php if ($_SESSION["statut"] != "Professeur" && !isset($contacts)) :?>
    <div class="notification is-warning is-light">
      Si vous possédez une <strong>convention de stage</strong> avec cette entreprise, ajoutez le contact qui a signé votre convention<BR>
      Vous serez ensuite autorisé à enregistrer votre stage depuis cette page.
    </div>
  <?php endif;?>

  <div class="column is-full">
  <div class="box">
    <div class="is-flex m-2" style="gap: 2%;">
      <p class="title is-4 m-0">Contacts :</p>
      <a href='router.php?page=contact_create&idEntreprise=<?= $_GET["idEntreprise"] ?>'>
        <button type='button' class='button'>Ajouter un contact</button>
      </a>
    </div>
      <?php if($contacts):?>  
      <table class="table table-striped table-hover">
        <tbody>
          <?php foreach ($contacts as $contact): ?>
            <tr>
              <td><?= $contact->nom ? $contact->nom : "Non défini" ?> <?= $contact->prenom ? $contact->prenom : "Non défini" ?></td>
              <td><?= $contact->telephone ? $contact->telephone : "Non défini" ?></td>
              <td><?= $contact->email ? $contact->email : "Non défini" ?></td>
              <!-- <td><?= $contact->fonction ? $contact->fonction : "Non défini" ?></td>-->
              <td>
                <a href="../router.php?page=Contact_fiche&idContact=<?= $contact->EmployeID ?>">voir</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif?>
    </div>
  </div>

  <?php if(isset($contacts[0])):?>
  <div class="column is-full">
    <div class="box is-full">
      <div class="is-flex m-2" style="gap: 2%;">
        <p class="title is-4 m-0">Stages :</p>
        <?php if($_SESSION["statut"] != "Professeur"):?>
          <a href='router.php?page=stage_create&idEntreprise=<?=$ficheEntreprise->EntrepriseID?>'>
            <button type='button' class='button'>Ajouter un stage</button>
          </a>
        <?php endif;?>
      </div>

      <?php if (isset($stages[0])):?>

        <p>Les stages sont visibles par les étudiants et les professeurs.</p>
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
            <?php foreach ($stages as $stage) : ?>
              <tr>
                <td>
                  <?php if($_SESSION["statut"] == "Professeur"):?>
                    <a href="../router.php?page=view_profil&id=<?= $stage->idEtudiant ?>"><?= $stage->EtudiantNom . " " . $stage->EtudiantPrenom?></a>
                  <?php else:?>
                    <p><?= $stage->EtudiantNom . " " . $stage->EtudiantPrenom?></p>
                  <?php endif;?>
                </td>
                <td><?= $stage->classe ? $stage->classe : "-" ?></td>
                <td><?= $stage->dateDebut ? $stage->dateDebut : "-" ?></td>
                <td><?= $stage->dateFin ? $stage->dateFin : "-" ?></td>
                <td>
                  <a href="../router.php?page=Contact_fiche&idContact=<?= $stage->idMaitreDeStage ?>"><?= $stage->employe_nom . " " . $stage->employe_prenom ?></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php else: ?>
        <p class="p-2">Aucun stage n'a été trouvé pour cette entreprise.</p>
      <?php endif; ?>
    </div>
  </div>
  <?php endif; ?>
</div>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    if (window.location.hash.endsWith("contactSuccess")) {
      document.getElementById('ContactSuccess').style.display = 'block';
    }
  });
</script>


<?php
} else {
  // Si aucune entreprise n'a été trouvée, afficher un message d'erreur
  echo "<p>Aucune entreprise trouvée avec cet identifiant.</p>";
}?>


<div class="modal" id="updateModal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title is-size-4">Mise à jour (API)</p>
      <button class="delete" aria-label="close" id="closeModal" for="updateModal"></button>
    </header>
    <section class="modal-card-body">
      <p>La mise à jour via l'API fonctionne uniquement si un siret est renseigné.</p>
      <form id="updateForm" action="../controller/api_update.php" method="POST">
        <input type="hidden" name="EntrepriseID" value="<?=$ficheEntreprise->EntrepriseID?>">
        <div class="field">
          <label class="label" id="siret">Merci de renseigner un N° de Siret</label>
          <div class="control">
            <input class="input" type="text" name="siret" id="siretInput" maxlength="14" placeholder="Siret">
          </div>
        </div>
      </form>
    </section>
    <footer class="modal-card-foot">
      <div class="buttons">
        <button class="button is-success" id="submitModal" disabled>Mettre à jour</button>
        <button class="button" id="closeModal" for="updateModal">Annuler</button>
      </div>
    </footer>
  </div>
</div>

<!-- -----------------------------MODAL DE SUPPRESSION DE L'ENTREPRISE--------------------------------- -->
 <?php if($_SESSION["statut"] == "Professeur"):?>
<div class="modal" id="modalSupprimer">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Êtes-vous sûr(e) de vouloir supprimer cette entreprise ?</p>
    </header>
    <section class="modal-card-body unselectable">
      <form id="delForm" method="post">
        <p>La suppression de cette entreprise entraînera la suppression des données suivantes :</p>
        <p>Nom et adresse de l'entreprise, coordonnées téléphoniques, adresse e-mail, secteur d'activité etc</p>

        <?php if (isset($_POST["EntrepriseID"])) {
          $idEntreprise = $_POST["EntrepriseID"];

          $sql = "DELETE FROM " . $table_name . " WHERE id = :EntrepriseID";
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(":EntrepriseID", $idEntreprise);
          $stmt->execute();
          header("Location: router.php?page=listerEntreprises");
        }?>

        <br>
        <span class="icon has-text-warning">
          <i class="fas fa-exclamation-triangle"></i>
        </span>
        <strong>Attention, en appuyant sur le bouton "Supprimer" pour supprimer ces données, vous acceptez que toutes les informations soient irrémédiablement effacées et ne pourront jamais être récupérées.</strong>

        <input type="hidden" name="EntrepriseID" value="<?php echo $idEntreprise; ?>">
      </form>
    </section>
    <footer class="modal-card-foot">
      <div class="buttons">
        <button class="button is-danger" id="confirmDelete" type="button">Supprimer&nbsp;<p class="icon"><i class="fas fa-trash-alt"></i></p></button>
        <button class="button cancel" id="closeModal" for="modalSupprimer">Annuler</button>
      </div>
    </footer>
  </div>
</div>

<div class="modal" id="nomEntreprise">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Changement de nom d'entreprise</p>
      <button id="closeModal" class="delete" for="nomEntreprise" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <form id="changerNom" action="../controller/entreprise_update_nom.php" method="POST">
        <div class="field">
          <label class="label">Nouveau nom de l'entreprise :</label>
          <div class="control">
        <input class="input" type="text" id="nouveauNom" name="nomEntreprise" placeholder="Entrez le nouveau nom de l'entreprise" value="<?= $ficheEntreprise->nomEntreprise?>" required>
          </div>
        </div>
        <input type="hidden" id="entrepriseID" name="entrepriseID" value="<?= $ficheEntreprise->EntrepriseID ?>">
      </form>
    </section>
    <footer class="modal-card-foot">
      <div class="buttons">
        <button class="button is-success" id="changerNomBtn">Changer</button>
        <button id="closeModal" class="button" for="nomEntreprise">Annuler</button>
      </div>
    </footer>
  </div>
</div>

<?php endif;?>


<script>
   function redirectPageRetour() {
    window.location.href = 'router.php?page=listerEntreprises';
  }
document.getElementById('confirmDelete').addEventListener('click', function(event) {
    var form = document.getElementById('delForm');
    form.submit();

    setTimeout(function() {
        window.location.href = 'router.php?page=listerEntreprises';
    }, 1000); 
});
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('siretInput').addEventListener('input', function() {
      var siretInput = document.getElementById('siretInput');
      var submitModal = document.getElementById('submitModal');

      if (siretInput.value.length === 14) {
        submitModal.disabled = false;
      } else {
        submitModal.disabled = true;
      }
    });

    document.getElementById('submitModal').addEventListener('click', function() {
      document.getElementById('updateForm').submit();
    });

    document.getElementById('changerNomBtn').addEventListener('click', function() {
      var nouveauNom = document.getElementById('nouveauNom').value;
      if (nouveauNom.trim() === '') {
      alert("Le nom de l'entreprise ne peut pas être vide");
      return;
      }
      document.getElementById('changerNom').submit();
    });

  });

</script>

<?php
// Votre code PHP pour récupérer et afficher les issues ici
require_once 'config/auth.php';
?>

<p class="title is-1">Application Gestage BTS SIO</p>
<p class="subtitle is-3">Recherche et gestion de stages</p>
<div class="field is-grouped is-grouped-multiline">
  <div class="control">
    <div class="tags has-addons is-small">
      <span class="tag is-dark">Entreprises:</span>
      <span class="tag is-info"><?= "<b>" . count($entreprises) . "</b>" ?></span>
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

<br>
<?php
// +------------------------------------+
// |           Page etudiant            |
// +------------------------------------+

if ($_SESSION['statut'] == "Etudiant") { ?>
  <div class="box">
    <p class="subtitle is-3">Fonctionnement</p>

    <nav class="columns is-mobile is-vcentered">
      <div class="column">
        <div>
          <p class="heading">Trouver une entreprise</p>
          <p class="title">Étape 1</p>
          <p>Recherchez un entreprise ou consultez l'annuaire des entreprises.</p>
        </div>
      </div>
      <div class="column">
        <div>
          <i class='fas fa-chevron-right' style='font-size:48px'></i>
        </div>
      </div>
      <div class="column">
        <div>
          <p class="heading">Ajoutez votre entreprise</p>
          <p class="title">Étape 2</p>
          <p>Récupérez le numéro de SIRET, puis importez cette entreprise.</p>
        </div>
      </div>
      <div class="column">
        <div>
          <i class='fas fa-chevron-right' style='font-size:48px'></i>
        </div>
      </div>
      <div class="column">
        <div>
          <p class="heading">Ajouter un contact</p>
          <p class="title">Étape 3</p>
          <p>Depuis une fiche entreprise, ajoutez le contact que vous avez démarché.</p>

        </div>
      </div>
      <div class="column">
        <div>
          <i class='fas fa-chevron-right' style='font-size:48px'></i>
        </div>
      </div>
      <div class="column">
        <div>
          <p class="heading">Ajouter votre stage</p>
          <p class="title">Étape 4</p>
          <p>Créer votre stage et récupérez votre convention de stage automatiquement générée.
          </p>

        </div>
      </div>
    </nav>
  </div>

<?php } ?>
<?php
// +------------------------------------+
// |           Page professeur          |
// +------------------------------------+

if ($_SESSION['statut'] == "Professeur") { ?>

  <?php if (($operations && $operations != null)) : ?>
    <div class="box">
      <p class="subtitle is-3">Opérations en attente de validation</p>
      <p class="is-size-4"><?= $operationsTuteur && $operationsTuteur != null ? "<b><span class='is-size-4'>" . count($operationsTuteur) . "</span></b> opérations réalisées par les étudiants que vous suivez." : "" ?></p>
      <p class="is-size-5"><?= $operations && $operations != null ? "<b><span class='is-size-4'>" . count($operations) - ($operationsTuteur && $operationsTuteur != null ? count($operationsTuteur) : 0) . "</span></b> opérations réalisées par les étudiants que vous ne suivez pas." : "" ?></p>
      <br>
      <a class="button is-info" href="/router.php?page=valider_operation">Valider les opérations</a>
    </div>
  <?php endif; ?>

  <div class="box">
    <p class="subtitle is-3">Stages à suivre</p>
    <table class="table is-fullwidth">
      <thead>
        <tr>
          <th>Étudiant</th>
          <th>Classe</th>
          <th>Spécialité</th>
          <th>Entreprise</th>
          <th>Adresse</th>
          <th>Contact</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($stages as $stage) {
          if ($stage->idProfesseur == $_SESSION['userID']) {
            echo "<tr>";
            echo "<td>" . $stage->EtudiantNom . " " . $stage->EtudiantPrenom . "</td>";
            echo "<td>" . $stage->classe . "</td>";
            echo "<td>" . $stage->EtudiantSpe . "</td>";
            echo "<td>" . $stage->Entreprise . "</td>";
            echo "<td>" . $stage->Entreprise_adresse . " " . $stage->Entreprise_codePostal . " " . $stage->Entreprise_ville . "</td>";
            echo "<td><a href='/router.php?page=Contact_fiche&idContact=" . $stage->employe_id . "'>" . $stage->employe_nom . " " . $stage->employe_prenom . "</a></td>";
            echo "<td><a class='button is-info' href='/router.php?page=stage_read&id=" . $stage->idStage . "'>Fiche</a></td>";
            echo "</tr>";
          }
        } ?>
      </tbody>
    </table>
  </div>
<?php } ?>
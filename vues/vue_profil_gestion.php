<?php
require_once 'config/auth.php';
?>

<?php

function convertDateFormat($date)
{
  // Utiliser DateTime pour convertir le format
  $dateTime = DateTime::createFromFormat('Y-m-d', $date);
  if ($dateTime) {
    return $dateTime->format('d/m/Y');
  } else {
    // Gérer l'erreur si le format de la date est incorrect
    return false;
  }
}
// Vérifier si les détails du profil sont disponibles
if ($_SESSION['statut'] == "Professeur") {
  $dateActuelle = new DateTime();

  $profilsActif = array_filter($profils, function ($profil) {
    return $profil->inactif == 0;
  });
  $profilsPWReset = array_filter($profils, function ($profil) {
    return $profil->password_reset == 1;
  });

  function getClasses($users, $classe) {
    $resultFilter = array_filter($users, function ($user) use ($classe) { return $user->classe == $classe; });
    return $resultFilter;
  }

?>
  <div class="field is-grouped" style="align-items: center;">
    <div>
      <p class="title is-2">Gestion utilisateurs</p>
      <p class="subtitle is-4">Administration des comptes</p>
    </div>
    <a class='button is-success' href='router.php?page=create_user' role='button' style="height: 100%; margin-left: 3%;">Créer un compte</a>
  </div>

  <div class="field is-grouped is-grouped-multiline">
    <div class="control">
      <div class="tags has-addons is-medium">
        <span class="tag is-dark">Actif</span>
        <span class="tag is-success"><?= "<b>" . count($profilsActif) . "</b>" ?></span>
      </div>
    </div>
    <div class="control">
      <div class="tags has-addons is-medium">
        <span class="tag is-dark">Inactif</span>
        <span class="tag is-danger"><?= "<b>" . count($profils) -  count($profilsActif) . "</b>" ?></span>
      </div>
    </div>
    <div class="control">
      <div class="tags has-addons is-medium">
        <span class="tag is-dark">Password inchangé</span>
        <span class="tag is-warning"><?= "<b>" . count($profilsPWReset) . "</b>" ?></span>
      </div>
    </div>
    <div class="control">
      <div class="tags has-addons is-medium">
        <span class="tag is-dark">Professeur</span>
        <span class="tag is-link"><?= "<b>" . count(getClasses($profils, "Enseignant")) . "</b>" ?></span>
      </div>
    </div>
    <div class="control">
      <div class="tags has-addons is-medium">
        <span class="tag is-dark">SIO 1</span>
        <span class="tag is-link"><?= "<b>" . count(getClasses($profils, "SIO1")) . "</b>" ?></span>
      </div>
    </div>
    <div class="control">
      <div class="tags has-addons is-medium">
        <span class="tag is-dark">SIO 2</span>
        <span class="tag is-link"><?= "<b>" . count(getClasses($profils, "SIO2")) . "</b>" ?></span>
      </div>
    </div>
    <div class="control">
      <div class="tags has-addons is-medium">
        <span class="tag is-dark">Ancien étudiant</span>
        <span class="tag is-link"><?= "<b>" . count(getClasses($profils, "Ancien étudiant")) . "</b>" ?></span>
      </div>
    </div>
  </div>


  <table class="table table-striped table-hover tableFilter" id="maTable">
    <thead>
      <tr class="table-secondary">
        <th class="lineFilter" name="Utilisateur"></th>
        <th class="lineFilter" name="Date d'entrée"></th>
        <th class="lineFilter" name="Classe"></th>
        <th class="lineFilter" name="Login"></th>
        <th class="lineFilter" name="Spécialité"></th>
        <th class="lineFilter" name="Statut"></th>
        <th>
          <div class="tooltip">
            <span>Reset password &#9432;</span>
            <span class="tooltiptext">Mot de passe : <u>achanger</u></span>
          </div>
        </th>
        <th>
          <div class="tooltip">
            <span>Désactivé &#9432;</span>
            <span class="tooltiptext">Le compte deviendra inactif</span>
          </div>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($profils as $profil) : ?>
        <tr style="cursor: pointer;" onclick="window.location.href = 'router.php?page=view_profil&id=<?= $profil->id ?>'">
          <td><?= $profil->nom ?> <?= $profil->prenom ?></td>
          <td><?= isset($profil->date_entree) ? convertDateFormat($profil->date_entree) : "Non défini"; ?></td>
          <td><?= isset($profil->classe) ? $profil->classe : "Non défini" ?></td>
          <td><?= $profil->login ?></td>
          <td><?= $profil->spe ?></td>
          <td><?= $profil->statut ?></td>
          <?php
          if ($profil->password_reset == "1") {
            echo "<td><a class='button is-warning'
                        href='router.php?page=reset_password&idProfil=" .
              $profil->id . "' role='button'>En cours</a></td>";
          }

          if ($profil->password_reset == "0") {
            echo "<td><a class='button is-success'
                        href='router.php?page=reset_password&idProfil=" .
              $profil->id . "' role='button'>Reset</a></td>";
          }

          if ($profil->inactif == 1) {
            echo "<td><a class='button is-danger'
                        href='router.php?page=profil_enable&idProfil=" .
              $profil->id . "' role='button'>Désactivé</a></td>";
          }

          if ($profil->inactif == 0) {
            echo "<td><a class='button is-success'
                        href='router.php?page=profil_disable&idProfil=" .
              $profil->id . "' role='button'>Actif</a></td>";
          }
          ?>
        <?php endforeach; ?>
        </tr>
    </tbody>
  </table>

<?php
} else {
  // Si le statut de l'utilisateur connecté est n'est pas un professeur :
}
?>
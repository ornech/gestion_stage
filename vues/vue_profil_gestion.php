<?php
require_once 'config/auth.php';
include 'test_groupe.php';
?>

<?php
function convertDateFormat($date) {
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
    if($_SESSION['statut'] == "Professeur") {
      $dateActuelle = new DateTime();

      //$verif=verifgroupe($conn, $dateActuelle);
        // Afficher les détails du profil
?>
<H2> Gestion étudiants </H2>
  <a class='btn btn-success' href='router.php?page=create_user' role='button'>Créer un compte</a>
    <table class="table table-striped table-hover" id="maTable">
        <thead>
            <tr class="table-secondary">
              <th>Utilisateur</th>
              <th>Date d'entrée</th>
              <th>Classe</th>
              <th>Login</th>
              <th>Spécialité</button></th>
              <th>Statut</th>
              <th><span id ="mdp" class="hover-text">Reset password &#9432;</span></th>
              <th><span id="acc" class="hover-text">Désactivé  &#9432;</span> </th>
            </tr>
        </thead>
        <tr>
            <?php foreach ($profils as $profil): ?>
                  <tr style="cursor: pointer;" onclick="window.location.href = 'router.php?page=view_profil&id=<?= $profil->id ?>'">
                    <td><?= $profil->nom ?> <?= $profil->prenom ?></td>
                    <td><?PHP
                    $date_entree = convertDateFormat($profil->date_entree);
                    echo $date_entree;
                     ?></td>
                     <td><?=$test=verifgroupe($conn, $dateActuelle)?></td>
                    <td><?= $profil->login ?></td>
                    <td><?= $profil->spe ?></td>
                    <td><?= $profil->statut ?></td>
                    <?php
                      if ($profil->password_reset == "1"){echo "<td><a class='btn btn-warning'
                        href='router.php?page=reset_password&idProfil=" .
                        $profil->id . "' role='button'>En cours</a></td>";}

                      if ($profil->password_reset == "0"){echo "<td><a class='btn btn-success'
                        href='router.php?page=reset_password&idProfil=" .
                        $profil->id . "' role='button'>Reset</a></td>";}

                      if ($profil->inactif == 1){echo "<td><a class='btn btn-secondary'
                        href='router.php?page=profil_enable&idProfil=" .
                        $profil->id . "' role='button'>Désactivé</a></td>";}

                      if ($profil->inactif == 0){echo "<td><a class='btn btn-success'
                        href='router.php?page=profil_disable&idProfil=" .
                        $profil->id . "' role='button'>Actif</a></td>";}
                      ?>
                    <?php endforeach; ?>
                  </tr>
        </tbody>
    </table>
    <?php
      } else {
      // Si aucune entreprise n'a été trouvée, afficher un message d'erreur

      }
    ?>

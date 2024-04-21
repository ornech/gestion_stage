<?php
require_once 'config/auth.php';
?>

<?php

    // Vérifier si les détails du profil sont disponibles
    if($_SESSION['statut'] == "Professeur") {
        // Afficher les détails du profil
?>
<H2> Gestion étudiants </H2>

<style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
<BR>
    <div class="alert alert-warning" role="alert">
      <h4 class="alert-heading">Reset password</h4>
      <p class="mb-0">Le bouton <b>Reset</b> réinitialisele mot de passe de l'utilisateur en question avec la valeur "achanger".
        L'utilisateur sera automatiquement invité à changer son mot de passe. Le bouton restera "En cours" tant
      que l'utilisateur ne sera pas reconnecté.</p>
      <hr>
      <h4 class="alert-heading">Désactivé un compte</h4>
      <p class="mb-0">Le bouton <b>Actif</b> indique l'état du compte. En cliquant dessus ce compte ne sera
        plus autorisé à se connecter et passera en <b>Désactivé</b>. Pour le réactivé cliquez à nouveau dessus.</p>
    </div>
<BR>
    <table id="maTable">
        <thead>
            <tr>
              <th>Nom <button onclick="sortTable(0)">&#8645;</button> </th>
              <th onclick="sortTable(1)">Prénop</th>
              <th onclick="sortTable(2)">Promo <button onclick="sortTable(2)">&#8645;</button></th>
              <th onclick="sortTable(3)">Email</th>
              <th onclick="sortTable(4)">Statut<button onclick="sortTable(4)">&#8645;</button> </th>
              <th>Reset password</th>
              <th>Désactivé</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($profils as $profil): ?>
                <tr>
                    <td><?= $profil->nom ?></td>
                    <td><?= $profil->prenom ?></td>
                    <td><?= $profil->promo ?></td>
                    <td><?= $profil->email ?></td>
                    <td><?= $profil->statut ?></td>
                    <?php
                      if ($profil->password_reset == "1"){echo "<td><a class='btn btn-warning' href='router.php?page=reset_password&idProfil=" . $profil->id . "' role='button'>En cours</a></td>";}

                      if ($profil->password_reset == "0"){echo "<td><a class='btn btn-success' href='router.php?page=reset_password&idProfil=" . $profil->id . "' role='button'>Reset</a></td>";}
                      ?>
                    <?php
                      if ($profil->inactif == 1){echo "<td><a class='btn btn-secondary' href='router.php?page=profil_enable&idProfil=" . $profil->id . "' role='button'>Désactivé</a></td>";}

                      if ($profil->inactif == 0){echo "<td><a class='btn btn-success' href='router.php?page=profil_disable&idProfil=" . $profil->id . "' role='button'>Actif</a></td>";}
                      ?>
                    <?php endforeach; ?>
        </tbody>
    </table>
    <?php
      } else {
      // Si aucune entreprise n'a été trouvée, afficher un message d'erreur

      }
    ?>

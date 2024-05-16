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
        td{
          text-align: left;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
             vertical-align: middle;
        }
        th {
            background-color: #f2f2f9;
            font-weight: bold;
            text-align: center;
            
        }
        button {
        width: 100%;
        height: 100%; 
        border: none;
        background: none;
        cursor: pointer;
        padding: 0;
        font-weight: bold;
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
  <a class='btn btn-success' href='router.php?page=create_user' role='button'>Créer un compte</a>
    <table class="table table-striped table-hover" id="maTable">
        <thead>
            <tr class="table-secondary">
              <th><button onclick="sortTable(0)">Nom  &#8645;</th></button>
              <th><button onclick="sortTable(1)">Prénom &#8645;</button></th>
              <th><button onclick="sortTable(2)">Promo &#8645;</th></button>
              <th><button onclick="sortTable(3)">Spécialité &#8645;</button></th>
              <th><button onclick="sortTable(4)">Statut &#8645;</button> </th>
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
        </tbody>
    </table>
    <?php
      } else {
      // Si aucune entreprise n'a été trouvée, afficher un message d'erreur

      }
    ?>

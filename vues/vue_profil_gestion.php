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


    <table id="maTable">
        <thead>
            <tr>
              <th>Nom <button onclick="sortTable(0)">&#8645;</button> </th>
              <th onclick="sortTable(1)">Prénop</th>
              <th onclick="sortTable(2)">Promo <button onclick="sortTable(2)">&#8645;</button></th>
              <th onclick="sortTable(3)">Email</th>
              <th onclick="sortTable(4)">Statut<button onclick="sortTable(4)">&#8645;</button> </th>
              <th>Reset password</th>
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
                    <td><?= $profil->password_reset ?> <a class="btn btn-warning" href="#" role="button">Reset password</a></td>

            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
      } else {
      // Si aucune entreprise n'a été trouvée, afficher un message d'erreur

      }
    ?>

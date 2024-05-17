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
      .hover-text {
        position: relative;
        display: inline-block;
    }
        .hover-text::after {
          content:"";
          position: absolute;
          top: -200%;
          transform: translateX(-90%);
          display: none;
          background-color: #FFE5CC;
          width: 400px;
          font-weight: normal;
          }
        @media (max-width: 768px) {
        .hover-text::after {
            margin-top: 30px;
            padding: 10px; 
        }
}
          .hover-text:hover::after {
          display: block;
          }
          
        #mdp.hover-text::after {
          content: "En appuyant sur RESET, le mot de passe sera \"achanger\".";
        }
        #acc.hover-text::after{
            content: "Cliquez sur le bouton ACTIF pour désactiver le compte. Cliquez à nouveau pour le réactiver."
        }


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
  <a class='btn btn-success' href='router.php?page=create_user' role='button'>Créer un compte</a>
    <table class="table table-striped table-hover" id="maTable">
        <thead>
            <tr class="table-secondary">
              <th><button onclick="sortTable(0)">Nom &#8645;</button></th>
              <th><button onclick="sortTable(1)">Prénom &#8645;</button></th>
              <th><button onclick="sortTable(2)">Promo &#8645;</th></button>
              <th><button onclick="sortTable(3)">Spécialité &#8645;</button></th>
              <th><button onclick="sortTable(4)">Statut &#8645;</button> </th>
              <th><span id ="mdp" class="hover-text">Reset password &#9432;</span></th>
              <th><span id="acc" class="hover-text">Désactivé  &#9432;</span> </th>
            </tr>
        </thead>
        <tr>
            <?php foreach ($profils as $profil): ?>
                  <tr style="cursor: pointer;" onclick="window.location.href = 'router.php?page=view_profil&id=<?= $profil->id ?>'">
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
                  </tr>
        </tbody>
    </table>
    <?php
      } else {
      // Si aucune entreprise n'a été trouvée, afficher un message d'erreur

      }
    ?>

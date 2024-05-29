<?php
  require_once 'config/auth.php';
?>

<span class="is-2">Cliquez sur un étudiant pour l'ajouter</span>

<table class="table table-hover tableFilter">
  <thead>
    <tr>
      <td class="lineFilter" name="Nom"></td>
      <td class="lineFilter" name="Prénom"></td>
      <td class="lineFilter" name="Classe"></td>
      <td class="lineFilter" name="Spécialité"></td>
    </tr>
  </thead>
  <tbody>
    <?php foreach($profils as $profil):?>

      <tr>
      <td><?=$profil->nom?></td>
      <td><?=$profil->prenom?></td>
      <td><?=$profil->classe?></td>
      <td><?=$profil->spe?></td>
      </tr>

    <?php endforeach;?>

  </tbody>
</table>
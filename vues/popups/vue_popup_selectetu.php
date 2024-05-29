<?php
  require_once 'config/auth.php';
?>

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
  <?php foreach ($profils as $profil) : ?>
        <tr style="cursor: pointer;" onclick="window.location.href = 'router.php?page=view_profil&id=<?= $profil->id ?>'">
          <td><?= $profil->nom ?> <?= $profil->prenom ?></td>
          <td>test</td>
          <td>test</td>
          <td><?= $profil->login ?></td>
        <?php endforeach; ?>
        </tr>
    </tbody>

  </tbody>
</table>
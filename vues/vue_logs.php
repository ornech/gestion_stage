<?php
require_once 'config/auth.php';
?>

<?php


if(isset($logs)): ?>

<div class="container is-fluid">
  <h1 class="title">Journalisation</h1>
  <table class="table is-fullwidth" class="maTable">
    <thead>
      <tr>
        <th>Utilisateur</th>
        <th>Action</th>
        <th>Date</th>
        <th>Points obtenu</th>
        <th>Détails</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Fetch user logs from the database
      // Loop through the logs and display them in the table
      foreach ($logs as $log):
        ?>
        <tr>
          <td><a href="router.php?page=view_profil&id=<?=$log->idUser?>" target="_blank"><?=$log->nomEtu?> <?=$log->prenomEtu?></a></td>
          <td><?=$log->logType?></td>
          <td><?= date('d/m/Y H:i:s', strtotime($log->date)) ?></td>
          <td><?=$log->pointGagne?></td>
          <td><a href="router.php?page=view_logs_details&id=<?=$log->idActivite?>" target="_blank" class="button is-primary">Détail</a></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>

<?php endif; ?>

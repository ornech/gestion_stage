<?php
require_once 'config/auth.php';
?>

<?php if($contacts):?>

<p class="title has-text-centered">Opérations à valider</p>

<table class="table is-fullwidth is-fluid tableFilter" id="maTable">
  <thead>
    <th>Utilisateur</th>
    <th>Contact</th>
    <th>Date</th>
    <th>Actions</th>
  </thead>
  <tbody>
    <?php foreach($contacts as $contact):?>
      <tr>
        <td><?=$contact->Created_User?></td>
        <td><?=$contact->nom?> <?=$contact->prenom?></td>
        <td><?=$contact->Created_date?></td>
        <td>
          <div class="assemble">
            <a href="router.php?page=Contact_fiche&idContact=<?=$contact->EmployeID?>" target="_blank" class="button is-info is-small">Détail</a>

            <form action="/controller/valider_contact.php" method="POST">
              <input type="hidden" name="page" value="Contact_fiche">
              <input type="hidden" name="idContact" value="<?=$contact->EmployeID?>">
              <button type="submit" name="action" value="valider" class="button is-success is-small">Valider</button>
            </form>

            <form action="/controller/delete_contact.php" method="POST">
              <input type="hidden" name="page" value="Contact_fiche">
              <input type="hidden" name="idContact" value="<?=$contact->EmployeID?>">
              <button type="submit" name="action" value="refuser" class="button is-danger is-small">Refuser</button>
            </form>
          </div>
        </td>
      </tr>
    <?php endforeach;?>
  </tbody>
</table>

<?php else:?>
  <p class="is-size-1 has-text-centered ">Aucune opérations n'est à valider</p>
<?php endif;?>
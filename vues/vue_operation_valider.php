<?php
require_once 'config/auth.php';
?>

<?php
function getLink($type, $id){
  if($type == "contact") {
    return "router.php?page=Contact_fiche&idContact=$id";
  }
}
?>

<?php if($operations):?>

<p class="title has-text-centered">Opérations à valider</p>

<table class="table is-fullwidth tableFilter" id="maTable">
  <thead>
    <th>Utilisateur</th>
    <th>Type</th>
    <th style="width: 50%;">Nom</th>
    <th>Date</th>
    <th>Actions</th>
  </thead>
  <tbody>
    <?php foreach($operations as $operation):?>
      <tr>
        <td><?=$operation->nomUser?></td>

        <td><?=ucfirst($operation->type)?></td>

        <td><?=$operation->nomEntite?></td>

        <td><?=date('d/m/Y H:i', strtotime($operation->dateCreation))?></td>
        <td>
          <div class="assemble">
            <a href="<?= getLink($operation->type, $operation->idEntite)?>" target="_blank" class="button is-info is-small">Détail</a>

            <form action="/controller/valider_operation.php" method="POST">
              <input type="hidden" name="page" value="Contact_fiche">
              <input type="hidden" name="idEntite" value="<?=$operation->idEntite?>">
              <input type="hidden" name="type" value="<?=$operation->type?>">
              <button type="submit" name="action" value="valider" class="button is-success is-small">Valider</button>
            </form>

            <form action="/controller/refuser_operation.php" method="POST">
              <input type="hidden" name="page" value="Contact_fiche">
              <input type="hidden" name="idEntite" value="<?=$operation->idEntite?>">
              <input type="hidden" name="type" value="<?=$operation->type?>">
              <button type="submit" name="action" class="button is-danger is-small">Refuser</button>
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
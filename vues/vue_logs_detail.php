<?php
require_once 'config/auth.php';
?>

<?php
if(isset($log)): 
var_dump($log);
?>

<div class="container is-fluid">
  <h1 class="title">Modification du <?php echo date('d/m/Y', strtotime($log->date)) . " à " . date('H:i:s', strtotime($log->date)); ?></h1>

  <div class="columns">
    <div class="column">

      <div class="box">
        <p class="subtitle"><b>Détail :</b></p>
        <p><b>Type de journalisation :</b> <?= $log->logType ?></p>
        <p><b>Effectué par :</b> <a href="/router.php?page=view_profil&id=<?= $log->idUser?>"><?= $log->nomUser . " " . $log->prenomUser?></a></p>
        <p><b>Classe : </b> <?= $log->classeUser?></p>
        <p><b>Point obtenu : </b> <?= $log->pointGagne?></p>

        <?php if($log->entite_type == "contact" && $log->idLogType != 15):?> 
          <?php
            include_once 'model/Contact.php';
            $contactModel = new Contact($conn);
            $contact = $contactModel->read_fiche($log->entite_id);
          ?>
          <p><b>Nom du contact : </b> <?= $contact->nom . " " . $contact->prenom?></p>
          <p><b>Entreprise : </b> <?= $contact->entreprise . " à " . $contact->Entreprise_ville?></p>
          <button class="button is-info" onclick="window.location = '/router.php?page=Contact_fiche&idContact=<?=$log->entite_id?>'">Aller sur le contact</button>
       
          <?php elseif ($log->entite_type == "entreprise" && $log->idLogType != 17):?>
          <button class="button is-info" onclick="window.location = '/router.php?page=fiche_entreprise&idEntreprise=<?=$log->entite_id?>'">Aller sur l'entreprise</button>
        
          <?php endif; ?>
      </div>

      <?php if($log->old_values != 'null' || $log->new_values != 'null'): ?>
      <div class="columns is-mobile">
        <div class="column">

        <div class="box">
          <p class="subtitle">Ancienne valeur :</p>
          <code><?= (isset($log->old_values) && $log->old_values != null) ?></code>
        </div>

        </div>

        <div class="column">
         
          <div class="box">
            <p class="subtitle">Nouvelle valeur :</p>
          </div>

        </div>

      </div>
      <?php endif; ?>

    </div>
  </div>

</div>

<?php endif; ?>

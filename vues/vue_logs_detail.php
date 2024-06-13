<?php
require_once 'config/auth.php';
?>

<?php
if(isset($log)): 
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

        <!-- AFFICHACHE SUPPLEMENTAIRE POUR LES CONTACTS -->
        <?php if($log->entite_type == "contact" && $log->idLogType != 15):?> 
          <?php
            include_once 'model/Contact.php';
            $contactModel = new Contact($conn);
            $contact = $contactModel->read_fiche($log->entite_id);
          ?>

          <?php if($contact != null){ ?>
            <p><b>Nom du contact : </b> <?= $contact->nom . " " . $contact->prenom?></p>
            <p><b>Entreprise : </b> <?= $contact->entreprise . " à " . $contact->Entreprise_ville?></p><br>
            <button class="button is-info" onclick="window.location = '/router.php?page=Contact_fiche&idContact=<?=$log->entite_id?>'">Aller sur le contact</button>
          <?php } ?>
       
        <!-- AFFICHACHE SUPPLEMENTAIRE POUR LES ENTREPRISES -->
          <?php elseif ($log->entite_type == "entreprise" && $log->idLogType != 17):?>
            <?php
              include_once 'model/Entreprise.php';
              $entrepriseModel = new Entreprise($conn);
              $entreprise = $entrepriseModel->read_fiche($log->entite_id);
            ?>
            <?php if($entreprise != null){ ?>
              <p><b>Entreprise : </b> <?= $entreprise->nomEntreprise . " à " . $entreprise->ville?></p>
              <p><b>Adresse : </b> <?= $entreprise->adresse?></p>
              <p><b>Naf : </b> (<?= $entreprise->naf?>) <?= $entreprise->naf_libelle?></p>
              <p><b>Effectif : </b> <?= $entreprise->effectif?></p><br>

              <button class="button is-info" onclick="window.location = '/router.php?page=fiche_entreprise&idEntreprise=<?=$log->entite_id?>'">Aller sur l'entreprise</button>
            <?php } ?>

            <!-- AFFICHACHE SUPPLEMENTAIRE POUR LES PROFILS -->
            <?php elseif ($log->entite_type == "profil" && $log->idLogType != 13):?>
            <?php
              include_once 'model/Profil.php';
              $profilModel = new Profil($conn);
              $profil = $profilModel->read_profil($log->entite_id);
            ?>
            <?php if($profil != null){ ?>
              <p><b>Utilisateur : </b> <?= $profil->nom . " " . $profil->prenom?></p>
              <p><b>Classe : </b> <?= $profil->classe . " " . $profil->spe?></p>
              <?php if($profil->statut == "Etudiant"){?><p><b>Promo : </b> <?= $profil->promo?></p><br><?php }?>
              
              <button class="button is-info" onclick="window.location = '/router.php?page=view_profil&id=<?=$log->entite_id?>'">Aller sur le profil</button>
            <?php } ?>

            <!-- AFFICHACHE SUPPLEMENTAIRE POUR LES PROFILS -->
            <?php elseif ($log->entite_type == "stage" && $log->idLogType != 18):?>
            <?php
              include_once 'model/Stage.php';
              $stageModel = new Stage($conn);
              $stage = isset($stageModel->stage_by_id($log->entite_id)[0]) ? $stageModel->stage_by_id($log->entite_id)[0] : null;
            ?>
            <?php if($stage != null){ ?>
              <p><b>Entreprise : </b> <?= $stage->Entreprise . " à " . $stage->Entreprise_ville?></p>
              <p><b>Date : </b> <?= date('d/m/Y', strtotime($stage->dateDebut)) . " au " . date('d/m/Y', strtotime($stage->dateFin))?></p><br>
              
              <button class="button is-info" onclick="window.location = '/router.php?page=view_profil&id=<?=$log->entite_id?>'">Aller sur le stage</button>
            <?php } ?>
            
          <?php endif; ?>
      </div>

      <?php if($log->old_values != 'null' || $log->new_values != 'null'): 
        $modifCheck = array();
        if($log->old_values != 'null' && $log->new_values != 'null'):
          $modifCheck = checkModification($log->old_values, $log->new_values);
        endif;?>

      <div class="columns is-mobile">

        <?php if($log->old_values != 'null'): ?>
        <div class="column">
          <div class="box">
            <p class="subtitle">Ancienne valeur :</p>

            <?php if ($log->old_values != 'null') {
              $newValues = json_decode($log->old_values, true);
              foreach ($newValues as $key => $value) {
                $nameKey = setNameKey($key);
                if($nameKey != null) {
                  if (array_key_exists($key, $modifCheck)) {
                    echo "<p><span style='color:#00ce00'><b>$nameKey :</b> $value</span></p>";
                  } else {
                    echo "<p><b>$nameKey :</b> $value</p>";
                  }
                }
              }
            }?>

          </div>
        </div>
        <?php endif; ?>

        <?php if($log->new_values != 'null'): ?>
        <div class="column">
          <div class="box">
            <p class="subtitle">Nouvelle valeur :</p>

            <?php if ($log->new_values != 'null') {
              $newValues = json_decode($log->new_values, true);
              foreach ($newValues as $key => $value) {
                $nameKey = setNameKey($key);
                if($nameKey != null) {
                  if (array_key_exists($key, $modifCheck)) {
                    echo "<p><span style='color:red'><b>$nameKey :</b> $value</span></p>";
                  } else {
                    echo "<p><b>$nameKey :</b> $value</p>";
                  }
                }
              }
            }?>

          </div>
        </div>
        <?php endif; ?>

      </div>
      <?php endif; ?>

    </div>
  </div>

</div>

<?php endif; ?>

<?php 
function setNameKey($key){
  $key = strtolower($key);
  if (str_contains($key, 'id') == true || str_contains($key, 'password') == true) {
    return null;
  }

  $key = strtolower($key);
  $key = str_replace(['-', '_'], ' ', $key);
  $key = ucwords($key);

  return $key;
}

function checkModification($oldValues, $newValues){
  $modifCheck = array();
  if ($oldValues != 'null' && $newValues != 'null') {
    $oldValues = json_decode($oldValues, true);
    $newValues = json_decode($newValues, true);
    foreach ($oldValues as $key => $value) {
      if ($oldValues[$key] != $newValues[$key]) {
        $modifCheck[$key] = $newValues[$key];
      }
    }
  }
  return $modifCheck;
}
?>
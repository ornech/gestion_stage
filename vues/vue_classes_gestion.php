<?php
require_once 'config/auth.php';
include_once 'controller/get_classes.php';
include_once 'controller/verifications.php';

$classes = getClasses($conn);

setlocale(LC_TIME, 'fr_FR.UTF-8');
$fmt = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE, 'Europe/Paris', IntlDateFormatter::GREGORIAN);

function getFinDateScolaire()
{
  $currentYear = date('Y');
  $today = new DateTime();
  // Définir les dates de début et de fin de l'année scolaire
  $finAnneeScolaire = new DateTime("$currentYear-06-30");
  $debutAnneeScolaire = new DateTime("$currentYear-09-01");
  // Si aujourd'hui est avant le 1er septembre, ajuster les années scolaires
  if ($today < $debutAnneeScolaire) {
    $debutAnneeScolaire->modify('-1 year');
  } else {
    $finAnneeScolaire->modify('+1 year');
  }
  return $finAnneeScolaire;
}

function getPromoByClasse($classe)
{
  $date = getFinDateScolaire();
  if ($classe == "SIO1") {
    return $date->format('Y') + 1;
  } else if ($classe == "SIO2") {
    return $date->format('Y');
  }
}
?>

<p class="title is-2">Gestion des classes</p>
<p class="subtitle is-4">Administration des classes</p>
<br>
<p class="subtitle is-4">Classes actuelles :</p>
<?php $i = 0;
foreach ($classes["actuelles"] as $classe): ?>

  <?php if ($i == 0):
    $i = 2; ?>
    <div class="columns">
    <?php endif; ?>
    <div class="column">
      <div class="box">
        <p class="title is-5"><?php echo $classe->nomClasse . " promotion " . $classe->promo ?></p>

        <div class="field is-grouped is-grouped-multiline">
          <div class="control">
            <div class="tags has-addons is-small">
              <span class="tag is-dark">SLAM:</span>
              <span class="tag is-info"><b><?= $classe->slam ? $classe->slam : 0?></b></span>
            </div>
          </div>
          <div class="control">
            <div class="tags has-addons is-small">
              <span class="tag is-dark">SISR :</span>
              <span class="tag is-success"><b><?= $classe->sisr ? $classe->sisr : 0?></b></span>
            </div>
          </div>
        </div>

        <?php
          $actualPP = $classe->nomProf;

          $dateDebutStage = $classe->dateDebut;
          $dateFinStage = $classe->dateFin;

          $countStudents = $classe->nbrEtu ? $classe->nbrEtu : 0;
        ?>

        <p><b>Nombre d'étudiant</b> : <?= $countStudents ?></p>
        <p><b>Professeur principal</b> : <span id="nomProf"><?= $actualPP != null ? $actualPP : "Aucun professeur défini" ?> <button id="openModal" for="modalPP" nomClasse="<?= $classe->nomClasse?>" promo="<?= $classe->promo ?>" class="button is-small"><span class="icon"><i class="fas fa-pencil-alt"></i></span></button></span></p>
        
        <p><b>Date début de stage</b> : <span>
                                          <?php if($dateDebutStage != null):?><?= $fmt->format(strtotime($dateDebutStage))?> <button id="openModal" for="modalUpdateStage" nomClasse="<?= $classe->nomClasse ?>" promo="<?= $classe->promo ?>" class="button is-small"><span class="icon"><i class="fas fa-pencil-alt"></i></span></button>
                                          <?php elseif($dateDebutStage == null):?><?= "Aucun stage défini"?> <button id="openModal" for="modalUpdateStage" nomClasse="<?= $classe->nomClasse ?>" promo="<?= $classe->promo ?>" class="button is-small"><span class="icon"><i class="fas fa-pencil-alt"></i></span></button>
                                          <?php endif;?>
                                        </span>
        </p>

        <p><b>Date fin de stage</b> : <span>
                                        <?php if($dateFinStage != null):?><?= $fmt->format(strtotime($dateFinStage))?> <button id="openModal" for="modalUpdateStage" nomClasse="<?= $classe->nomClasse ?>" promo="<?= $classe->promo ?>" class="button is-small"><span class="icon"><i class="fas fa-pencil-alt"></i></span></button>
                                        <?php elseif($dateFinStage == null):?><?= "Aucun stage défini"?> <button id="openModal" for="modalUpdateStage" nomClasse="<?= $classe->nomClasse ?>" promo="<?= $classe->promo ?>" class="button is-small"><span class="icon"><i class="fas fa-pencil-alt"></i></span></button>
                                        <?php endif;?>
                                      </span>
      </div>
    </div>
    <?php if ($i == 1): ?>
    </div>
  <?php endif;
    $i--; ?>
<?php endforeach; ?>

<p class="subtitle is-4">Anciennes classes :</p>
<?php $i = 0;
foreach ($classes["anciennes"] as $classe): ?>

  <?php if ($i == 0):
    $i = 2; ?>
    <div class="columns">
    <?php endif; ?>
    <div class="column">
      <div class="box">
        <p class="title is-5"><?php echo $classe->nomClasse . " promotion " . $classe->promo ?></p>

        <div class="field is-grouped is-grouped-multiline">
          <div class="control">
            <div class="tags has-addons is-small">
              <span class="tag is-dark">SLAM:</span>
              <span class="tag is-info"><b><?= $classe->slam ? $classe->slam : 0 ?></b></span>
            </div>
          </div>
          <div class="control">
            <div class="tags has-addons is-small">
              <span class="tag is-dark">SISR :</span>
              <span class="tag is-success"><b><?= $classe->sisr ? $classe->sisr : 0 ?></b></span>
            </div>
          </div>
        </div>

        <?php
        $actualPP = $classe->nomProf;

        $dateDebutStage = $classe->dateDebut;
        $dateFinStage = $classe->dateFin;

        $countStudents = $classe->nbrEtu ? $classe->nbrEtu : 0;
        ?>

        <p><b>Nombre d'étudiant</b> : <?= $countStudents ?></p>
        <p><b>Professeur principal</b> : <span
            id="nomProf"><?= $actualPP != null ? $actualPP : "Aucun professeur défini" ?> <button id="openModal"
              for="modalPP" nomClasse="<?= $classe->nomClasse ?>" promo="<?= $classe->promo ?>"
              class="button is-small"><span class="icon"><i class="fas fa-pencil-alt"></i></span></button></span></p>

        <p><b>Date début de stage</b> : <span>
            <?php if ($dateDebutStage != null): ?>    <?= $fmt->format(strtotime($dateDebutStage)) ?> <button id="openModal"
                for="modalUpdateStage" nomClasse="<?= $classe->nomClasse ?>" promo="<?= $classe->promo ?>"
                class="button is-small"><span class="icon"><i class="fas fa-pencil-alt"></i></span></button>
            <?php elseif ($dateDebutStage == null): ?>    <?= "Aucun stage défini" ?> <button id="openModal"
                for="modalUpdateStage" nomClasse="<?= $classe->nomClasse ?>" promo="<?= $classe->promo ?>"
                class="button is-small"><span class="icon"><i class="fas fa-pencil-alt"></i></span></button>
            <?php endif; ?>
          </span>
        </p>

        <p><b>Date fin de stage</b> : <span>
            <?php if ($dateFinStage != null): ?>    <?= $fmt->format(strtotime($dateFinStage)) ?> <button id="openModal"
                for="modalUpdateStage" nomClasse="<?= $classe->nomClasse ?>" promo="<?= $classe->promo ?>"
                class="button is-small"><span class="icon"><i class="fas fa-pencil-alt"></i></span></button>
            <?php elseif ($dateFinStage == null): ?>    <?= "Aucun stage défini" ?> <button id="openModal" for="modalUpdateStage"
                nomClasse="<?= $classe->nomClasse ?>" promo="<?= $classe->promo ?>" class="button is-small"><span
                  class="icon"><i class="fas fa-pencil-alt"></i></span></button>
            <?php endif; ?>
          </span>
      </div>
    </div>
    <?php if ($i == 1): ?>
    </div>
  <?php endif;
    $i--; ?>
<?php endforeach; ?>

<div class="modal" id="modalPP">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title title" id="modelProfTitle"></p>
      <button class="delete cancel" id="closeModal" for="modalPP" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <form id="tuteurForm" action="/controller/classe_update_prof.php" method="post">
        <div class="is-grouped">
          <label for="selectIdProfPrincipal">Nouveau professeur :</label>
          <input type="hidden" id="nomClasse" name="nomClasse" value="">
          <input type="hidden" id="promo" name="promo" value="">
          <input type="hidden" id="nomProfInput" name="nomProf" value="">
          <div class="select is-small">
            <select id="selectIdProfPrincipal" name="idProfPrincipal">
              <option value="-1">Aucun professeur principal</option>

              <?php foreach ($profs as $prof) : ?>
                <option value="<?= $prof->id ?>">
                  <?= "$prof->nom $prof->prenom" ?>
                </option>
              <?php endforeach; ?>

            </select>
          </div>
        </div>
      </form>
    </section>
    <footer class="modal-card-foot">
      <div class="buttons">
        <button class="button is-success" id="savePP">Enregistrer</button>
        <button class="button" id="closeModal" for="modalPP">Annuler</button>
      </div>
    </footer>
  </div>
</div>

<div class="modal" id="modalUpdateStage">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title title" id="modelProfTitle">Modification dates stage</p>
      <button class="delete cancel" id="closeModal" for="modalUpdateStage" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <form id="updateStageForm" action="/controller/update_stage_dates.php" method="post">
        <input type="hidden" id="nomClasse" name="nomClasse" value="">
        <input type="hidden" id="promo" name="promo" value="">
        <div class="is-grouped">
          <div class="field is-horizontal">
            <div class="field-body">
              <div class="field">
                <label class="label" for="dateDebut">Dates début :</label>
                <div class="control">
                  <input class="input" type="date" id="dateDebut" name="dateDebut">
                </div>
              </div>
              <div class="field">
                <label class="label" for="dateFin">Dates fin :</label>
                <div class="control">
                  <input class="input" type="date" id="dateFin" name="dateFin">
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
    <footer class="modal-card-foot">
      <div class="buttons">
        <button class="button is-success" id="saveUpdateStage">Enregistrer</button>
        <button class="button" id="closeModal" for="modalUpdateStage">Annuler</button>
      </div>
    </footer>
  </div>
</div>

<script>

  <?php
    $classeTable = [];
    foreach ($classes as $classeStatut) {
      foreach ($classeStatut as $classe) {
        $dateDebutStage = $classe->dateDebut;
        $dateFinStage = $classe->dateFin;

        $classeTable[$classe->nomClasse . " " . $classe->promo] = [
          "dateDebutStage" => $dateDebutStage,
          "dateFinStage" => $dateFinStage
        ];
      }
    }
    echo "const classeTable = " . json_encode($classeTable);
  ?>

  document.querySelectorAll('#openModal').forEach(function(button) {
    button.addEventListener('click', function() {
      var action = this.getAttribute('for');

      var nomClasse = this.getAttribute('nomClasse');
      var promo = this.getAttribute('promo');

      console.log("Printed");

      if(!nomClasse && !promo) return;

      let accessTable = nomClasse + " " + promo


      if(action == "modalPP"){
        document.querySelector("#modalPP #nomClasse").value = nomClasse;
        document.querySelector("#modalPP #promo").value = promo;

        var modalTitle = document.getElementById('modelProfTitle');
        modalTitle.innerText = "Professeur principale (" + nomClasse + ")";

        parentSpan = this.parentElement;
        var nomProf = parentSpan.innerText.trim();
        var select = document.getElementById('selectIdProfPrincipal');


        var options = select.options;
        for (var i = 0; i < options.length; i++) {
          if (options[i].text.trim() === nomProf) {
            document.getElementById('nomProfInput').value = nomProf;
            select.selectedIndex = i;
            break;
          }
        }
      }else if(action == "modalUpdateStage"){
        document.querySelector("#modalUpdateStage #nomClasse").value = nomClasse;
        document.querySelector("#modalUpdateStage #promo").value = promo;
        document.querySelector("#modalUpdateStage #dateDebut").value = classeTable[accessTable]["dateDebutStage"];
        document.querySelector("#modalUpdateStage #dateFin").value = classeTable[accessTable]["dateFinStage"];
      }
    })
  });

  document.getElementById('selectIdProfPrincipal').addEventListener('change', function(select) {
    console.log(select.target.options[select.target.selectedIndex].text);
    var nomProf = select.target.options[select.target.selectedIndex].text;
    document.getElementById('nomProfInput').value = nomProf;
  });

  document.getElementById('savePP').addEventListener('click', function() {
    document.getElementById('tuteurForm').submit();
  });

  document.getElementById('saveUpdateStage').addEventListener('click', function() {
    document.getElementById('updateStageForm').submit();
  });
  

</script>
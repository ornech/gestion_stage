<?php
require_once 'config/auth.php';
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

$needStageCreateModal = false;
?>

<p class="title is-2">Gestion des classes</p>
<p class="subtitle is-4">Administration des classes</p>

<?php $i = 0;
foreach ($classes as $classe): ?>

  <?php if ($i == 0):
    $i = 2; ?>
    <div class="columns">
    <?php endif; ?>
    <div class="column">
      <div class="box">
        <p class="title is-5"><?php echo $classe->nomClasse ?></p>

        <div class="field is-grouped is-grouped-multiline">
          <div class="control">
            <div class="tags has-addons is-small">
              <span class="tag is-dark">SLAM:</span>
              <span class="tag is-info"><b><?= $profilModel->countSpeByClasse($classe->nomClasse, "SLAM")->count?></b></span>
            </div>
          </div>
          <div class="control">
            <div class="tags has-addons is-small">
              <span class="tag is-dark">SISR :</span>
              <span class="tag is-success"><b><?= $profilModel->countSpeByClasse($classe->nomClasse, "SISR")->count?></b></span>
            </div>
          </div>
        </div>

        <?php
          $actualPP = $classe->nomProf;

          $dateStage = $stageDatesModel->getStageByClasseAndPromo($classe->nomClasse, getPromoByClasse($classe->nomClasse));
          $dateDebutStage = $dateStage != false ? $dateStage->dateDebut : null;
          $dateFinStage = $dateStage != false ? $dateStage->dateFin : null;

          $countStudents = $profilModel->countByIdClasse($classe->id)->count;
        ?>

        <p><b>Nombre d'étudiant</b> : <?= $countStudents ?></p>
        <p><b>Professeur principal</b> : <span id="nomProf"><?= $actualPP != null ? $actualPP : "Aucun professeur défini" ?> <button id="openModal" for="modalPP" idClasse="<?= $classe->id?>" class="button is-small"><span class="icon"><i class="fas fa-pencil-alt"></i></span></button></span></p>
        
        <p><b>Date début de stage</b> : <span>
                                          <?php if($dateDebutStage != null):?><?= $fmt->format(strtotime($dateDebutStage))?> <button id="openModal" for="modalUpdateStage" idClasse="<?= $classe->id?>" class="button is-small"><span class="icon"><i class="fas fa-pencil-alt"></i></span></button>
                                          <?php elseif($dateDebutStage == null): $needStageCreateModal = true;?><?= "Aucun stage défini"?> <button id="openModal" for="modalCreateStage" idClasse="<?= $classe->id?>" class="button is-small"><span class="icon"><i class="fas fa-pencil-alt"></i></span></button>
                                          <?php endif;?>
                                        </span>
        </p>

        <p><b>Date fin de stage</b> : <span>
                                        <?php if($dateFinStage != null):?><?= $fmt->format(strtotime($dateFinStage))?> <button id="openModal" for="modalUpdateStage" idClasse="<?= $classe->id?>" class="button is-small"><span class="icon"><i class="fas fa-pencil-alt"></i></span></button>
                                        <?php elseif($dateFinStage == null): $needStageCreateModal = true;?><?= "Aucun stage défini"?> <button id="openModal" for="modalCreateStage" idClasse="<?= $classe->id?>" class="button is-small"><span class="icon"><i class="fas fa-pencil-alt"></i></span></button>
                                        <?php endif;?>
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
          <input type="hidden" id="idClasse" name="id" value="">
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

<div class="modal" id="modalCreateStage">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title title" id="modelProfTitle">Création dates stage</p>
      <button class="delete cancel" id="closeModal" for="modalCreateStage" aria-label="close"></button>
    </header>
    <section class="modal-card-body">

      <form id="createStageForm" action="/controller/create_stage_dates.php" method="post">
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
        <button class="button is-success" id="saveCreateStage">Enregistrer</button>
        <button class="button" id="closeModal" for="modalCreateStage">Annuler</button>
      </div>
    </footer>
  </div>
</div>


<script>

  <?php
    $classeTable = [];
    foreach ($classes as $classe) {
      $dateStage = $stageDatesModel->getStageByClasseAndPromo($classe->nomClasse, getPromoByClasse($classe->nomClasse));
      $dateDebutStage = $dateStage != false ? $dateStage->dateDebut : null;
      $dateFinStage = $dateStage != false ? $dateStage->dateFin : null;
      
      $classeTable[$classe->id] = [
        "nomClasse" => $classe->nomClasse,
        "promo" => getPromoByClasse($classe->nomClasse),
        "dateDebutStage" => $dateDebutStage,
        "dateFinStage" => $dateFinStage
      ];
    }
    echo "const classeTable = " . json_encode($classeTable);
  ?>

  document.querySelectorAll('#openModal').forEach(function(button) {
    button.addEventListener('click', function() {
      var idClasse = this.getAttribute('idClasse');
      var action = this.getAttribute('for');

      if(idClasse && action == "modalPP"){
        document.getElementById('idClasse').value = idClasse;

        var modalTitle = document.getElementById('modelProfTitle');
        modalTitle.innerText = "Professeur principale (" + classeTable[idClasse]["nomClasse"] + ")";

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
      }else if(idClasse  && action == "modalCreateStage"){
        document.querySelector("#modalCreateStage #nomClasse").value = classeTable[idClasse]["nomClasse"];
        document.querySelector("#modalCreateStage #promo").value = classeTable[idClasse]["promo"];
      }else if(idClasse  && action == "modalUpdateStage"){
        document.querySelector("#modalUpdateStage #nomClasse").value = classeTable[idClasse]["nomClasse"];
        document.querySelector("#modalUpdateStage #promo").value = classeTable[idClasse]["promo"];
        document.querySelector("#modalUpdateStage #dateDebut").value = classeTable[idClasse]["dateDebutStage"];
        document.querySelector("#modalUpdateStage #dateFin").value = classeTable[idClasse]["dateFinStage"];
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

  document.getElementById('saveCreateStage').addEventListener('click', function() {
    document.getElementById('createStageForm').submit();
  });

  document.getElementById('saveUpdateStage').addEventListener('click', function() {
    document.getElementById('updateStageForm').submit();
  });
  

</script>
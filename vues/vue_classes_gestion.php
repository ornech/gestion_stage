<?php
require_once 'config/auth.php';
setlocale(LC_TIME, 'fr_FR.UTF-8');
$fmt = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE, 'Europe/Paris', IntlDateFormatter::GREGORIAN);
?>

<?php $i = 0;
foreach ($classes as $classe): ?>

  <?php if ($i == 0):
    $i = 2; ?>
    <div class="columns">
    <?php endif; ?>
    <div class="column">
      <div class="box">
        <p class="title is-5"><?php echo $classe->nomClasse ?></p>

        <?php
        $actualPP = $classe->nomProf;
        $dateDebutStage = isset($classe->dateDebutStage) ? $classe->dateDebutStage : null;
        $dateFinStage = isset($classe->dateFinStage) ? $classe->dateFinStage : null;
        $countStudents = $profilModel->countByIdClasse($classe->id)->count;
        ?>

        <p><b>Nombre d'élèves</b> : <?= $countStudents ?></p>
        <p><b>Professeur principal</b> : <span id="nomProf"><?= $actualPP != null ? $actualPP : "Aucun professeur défini" ?> <button id="openModal" for="modalPP" idClasse="<?= $classe->id?>" class="button is-small"><span class="icon"><i class="fas fa-pencil-alt"></i></span></button></span></p>
        <p><b>Date début de stage</b> : <?= $dateDebutStage != null ? $fmt->format(strtotime($dateDebutStage)) : "Aucun stage défini" ?></p>
        <p><b>Date fin de stage</b> : <?= $dateFinStage != null ? $fmt->format(strtotime($dateFinStage)) : "Aucun stage défini" ?></p>
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
          <input type="hidden" id="idClass" name="id" value="">
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


<script>

  <?php
    $classeTable = [];
    foreach ($classes as $classe) {
      $classeTable[$classe->id] = $classe->nomClasse;
    }
    echo "const classeTable = " . json_encode($classeTable);
  ?>

  document.querySelectorAll('#openModal').forEach(function(button) {
    button.addEventListener('click', function() {
      var idClasse = this.getAttribute('idClasse');
      document.getElementById('idClass').value = idClasse;

      var modalTitle = document.getElementById('modelProfTitle');
      modalTitle.innerText = "Professeur principale (" + classeTable[idClasse] + ")";

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
    });
  });

  document.getElementById('selectIdProfPrincipal').addEventListener('change', function(select) {
    console.log(select.target.options[select.target.selectedIndex].text);
    var nomProf = select.target.options[select.target.selectedIndex].text;
    document.getElementById('nomProfInput').value = nomProf;
  });

  document.getElementById('savePP').addEventListener('click', function() {
    document.getElementById('tuteurForm').submit();
  });

</script>
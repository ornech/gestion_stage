<?php
require_once 'config/auth.php';
?>

<?php
  if (isset($_POST["Stage"]) && isset($_POST["Professeur"])) {
    $idStage = $_POST["Stage"];
    $idProfesseur = $_POST["Professeur"];

    $stage = new Stage($conn);
    if ($stage->assignation_suivi($idStage, $idProfesseur)) {
      ?>
      <div class="notification is-success">
        <p class="subtitle is-4">Changement effectué</p>
        L'assignation de professeur a été effectuée avec succès.
      </div>
      <?php
    } else {
      // Afficher un message d'erreur en cas d'échec de la mise à jour
      echo "Une erreur s'est produite.";
    }
  }
?>

<p class="title is-2">Liste des stages de la classe <?= $classe ?></p>

<table class="table is-fullwidth is-fluid tableFilter" id="maTable"">
  <thead>
    <tr>
      <th></th>
      <th>Classe</th>
      <th>Début du stage</th>
      <th>Fin de stage</th>
      <th>Professeur assigné</th>
      <th>Convention</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($profils as $profil) :
      $profilStage = array_filter($stageModel->readFromEtudiantId($profil->id), function ($stages) use ($classe) {
        return $stages->classe == $classe;
      });
      $professeurs = $profilModel->list_by_professeur();
      ?>

    <tr <?= isset($profilStage[0]) ? 'class="is-selected is-light"' : '' ?> >
      <th style="vertical-align: middle;">
        <a href="../router.php?page=view_profil&id=<?= $profil->id ?>">

          <?php if (!isset($profilStage[0])) : ?>
            <i class="fa-regular fa-circle" style="color: hsl(0 100% 50%);"></i>&nbsp;
          <?php elseif (isset($profilStage[0])) :
            $profilStage = $profilStage[0];  ?>
            <i class="fa-solid fa-circle" style="color: hsl(120 100% 25%);"></i>&nbsp;
          <?php endif; ?>

          <?php echo "$profil->nom  $profil->prenom"; ?>
        </a>
      </th>

      <td style="vertical-align: middle;"><?= isset($profil->classe) ? $profil->classe : "-" ?></td>
      <td style="vertical-align: middle;"><?= isset($profilStage->dateDebut) ? $profilStage->dateDebut : "-" ?></td>
      <td style="vertical-align: middle;"><?= isset($profilStage->dateFin) ? $profilStage->dateFin : "-" ?></td>

      <td style="vertical-align: middle;">
        <?php if(isset($profilStage->idProfesseur)) :?>

        <div class="changeProf">
          <form method="post" action="">
            <input type="hidden" name="Stage" class="stageId" value="<?= isset($profilStage->idStage) ? $profilStage->idStage : "" ?>">

            <select name="Professeur" class="Professeur select is-small">
              <?php foreach ($professeurs as $professeur) :?>
              <option value="<?= $professeur->id ?>" <?= isset($profilStage->idProfesseur) && $profilStage->idProfesseur == $professeur->id ? "selected" : "" ?>><?= "$professeur->nom $professeur->prenom" ?></option>
              <?php endforeach;?>
            </select>

          </form>
        </div>
        <?php else:?>
          -
        <?php endif; ?>
      </td>

      <td style="vertical-align: middle;"><?php if(isset($profilStage->idStage)):?><button class="button is-small" onclick="window.open('router.php?page=stage_convention&idStage=<?= $profilStage->idStage?>')">Récupérer</button><?php endif;?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<script>
  document.querySelectorAll('div.changeProf').forEach(function(div) {
    var select = div.querySelector('select');
    select.addEventListener('change', function() {
      if (div.querySelector('.stageId').value !== "") {
        this.form.submit();
      }
    });
  });
</script>

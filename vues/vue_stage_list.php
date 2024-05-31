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

function checkIsComplete($profilToCheck)
{
  if (isset($profilToCheck->idProfesseur) == true && isset($profilToCheck->dateDebut) == true && isset($profilToCheck->dateFin) == true) {
    return "complet";
  } else if (isset($profilToCheck->idProfesseur) == false || isset($profilToCheck->dateDebut) == false || isset($profilToCheck->dateFin) == false) {
    return "incomplet";
  }
  return "pas-de-stage";
}
?>

<p class="title is-2">Stage <?= $classe ?></p>

<table class="table is-fullwidth is-fluid tableFilter" id="maTable">
  <thead>
    <tr>
      <th>Noms étudiants</th>
      <th>Stages</th>
      <th>Début des stages</th>
      <th>Fin des stages</th>
      <th>Professeurs assignés</th>
      <th>Conventions</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($profils as $profil) :
      $profilStage = array_filter($stageModel->readFromEtudiantId($profil->id), function ($stages) use ($classe) {
        return $stages->classe == $classe;
      });

      if (isset($profilStage[0])) {
        $profilStage = $profilStage[0];
      } else {
        $profilStage = null;
      }

      $professeurs = $profilModel->list_by_professeur();
    ?>

      <tr <?= isset($profilStage) ? 'class="is-selected is-light"' : '' ?>>
        <th style="vertical-align: middle;">
          <a href="../router.php?page=view_profil&id=<?= $profil->id ?>">

            <?php
            if (!isset($profilStage)) : ?>
              <i class="fa-regular fa-circle" style="color: hsl(0 100% 50%);"></i>&nbsp;
            <?php elseif (checkIsComplete($profilStage) == "incomplet") : ?>
              <i class="fa-solid fa-circle" style="color: hsl(50 100% 50%);"></i>&nbsp;
            <?php else : ?>
              <i class="fa-solid fa-circle" style="color: hsl(120 100% 25%);"></i>&nbsp;
            <?php endif; ?>
            <?php echo "$profil->nom  $profil->prenom"; ?>

          </a>
        </th>

        <td style="vertical-align: middle;">
          <?php if (isset($profilStage->idStage)) : ?>
            <a href="router.php?page=stage_read&id=<?= $profilStage->idStage ?>"><b><?= isset($profilStage->Entreprise) ? $profilStage->Entreprise : "-" ?></b></a>
          <?php else : ?>
            -
          <?php endif; ?>
        </td>

        <td style="vertical-align: middle;"><?= isset($profilStage->dateDebut) ? $profilStage->dateDebut : "-" ?></td>
        <td style="vertical-align: middle;"><?= isset($profilStage->dateFin) ? $profilStage->dateFin : "-" ?></td>

        <td style="vertical-align: middle;">
          <div class="changeProf">
            <form method="post" action="">
              <input type="hidden" name="Stage" class="stageId" value="<?= isset($profilStage->idStage) ? $profilStage->idStage : "" ?>">

              <?php if (checkIsComplete($profilStage) != "pas-de-stage") : ?>

                <select name="Professeur" class="Professeur select is-small">
                  <?php if (isset($profilStage->idProfesseur)) : ?>
                    <?php foreach ($professeurs as $professeur) : ?>
                      <option value="<?= $professeur->id ?>" <?= isset($profilStage->idProfesseur) && $profilStage->idProfesseur == $professeur->id ? "selected" : "" ?>><?= "$professeur->nom $professeur->prenom" ?></option>
                    <?php endforeach; ?>
                  <?php else : ?>
                    <option value="">Aucun professeur assigné</option>
                    <?php foreach ($professeurs as $professeur) : ?>
                      <option value="<?= $professeur->id ?>"><?= "$professeur->nom $professeur->prenom" ?></option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              <?php else : ?>
                -
              <?php endif; ?>

            </form>
          </div>
        </td>

        <td style="vertical-align: middle;"><?php if (isset($profilStage->idStage)) : ?><button class="button is-small" onclick="window.open('router.php?page=stage_convention&idStage=<?= $profilStage->idStage ?>')">Récupérer</button><?php endif; ?></td>
        <td style="vertical-align: middle;"><?php if (isset($profilStage)) : ?><button class="button is-small is-primary" onclick="window.open('router.php?page=stage_edit&idStage=<?= $profilStage->idStage ?>')">Modifier</button><?php endif; ?></td>
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

<style>

  a, .is-selected{
    color: inherit !important;
  }
</style>


<script>
  function observeThemeChange() {
    var htmlElement = document.querySelector("html");
    if (htmlElement.getAttribute("data-theme") === "dark") {
      var isLightElements = document.querySelectorAll(".is-light");
      isLightElements.forEach(function(element) {
        element.classList.remove("is-light");
        element.classList.add("is-dark");
      })
    } else {
      var isDarkElements = document.querySelectorAll(".is-dark");
      isDarkElements.forEach(function(element) {
        element.classList.add("is-light");
        element.classList.remove("is-dark");
      })
    }
  }

  var observer = new MutationObserver(observeThemeChange);
  observer.observe(document.querySelector("html"), { attributes: true });

  addEventListener("DOMContentLoaded", observeThemeChange());
</script>
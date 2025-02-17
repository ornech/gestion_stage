<?php
require_once 'config/auth.php';

setlocale(LC_TIME, 'fr_FR.UTF-8');
$fmt = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE, 'Europe/Paris', IntlDateFormatter::GREGORIAN);

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
      <th>Entreprises</th>
      <th>Dates</th>
      <th>Conventions</th>
      <th>Journal</th>
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

      <tr <?= isset($profilStage) ? "class='is-selected is-light'" : "" ?>>
        <th style="vertical-align: middle;" <?= isset($profilStage) ? "onclick=\"window.location = 'router.php?page=stage_read&id={$profilStage->idStage}'\" style='cursor: pointer;'" : '' ?>>

          <?php
          if (!isset($profilStage)) : ?>
            <i class="fa-regular fa-circle" style="color: hsl(0 100% 50%);"></i>&nbsp;
          <?php elseif (checkIsComplete($profilStage) == "incomplet") : ?>
            <i class="fa-solid fa-circle" style="color: hsl(50 100% 50%);"></i>&nbsp;
          <?php else : ?>
            <i class="fa-solid fa-circle" style="color: hsl(120 100% 25%);"></i>&nbsp;
          <?php endif; ?>
          <?php echo "$profil->nom  $profil->prenom"; ?>

        </th>
        <td style="vertical-align: middle;" <?= (isset($profilStage->idStage) && isset($profilStage->Entreprise)) ? "onclick='event.stopPropagation(); window.location = \"router.php?page=fiche_entreprise&idEntreprise={$profilStage->idEntreprise}\"'" : "" ?>>
          <?php if (isset($profilStage->idStage)) : ?>
           <b style="text-decoration: underline;"><?= isset($profilStage->Entreprise) ? $profilStage->Entreprise : "-" ?></b>
          <?php else : ?>
            -
          <?php endif; ?>
        </td>

        <td style="vertical-align: middle;">
          <?php if(isset($profilStage->dateDebut) && isset($profilStage->dateFin)): ?>
            <?= $fmt->format(strtotime($profilStage->dateDebut)) ?> au <?= $fmt->format(strtotime($profilStage->dateFin)) ?>
          <?php else: ?>
            -
          <?php endif; ?>
        </td>
        <td>
          <?php if(isset($profilStage->idStage)): ?>
            <button onclick="event.stopPropagation(); window.location.href='router.php?page=stage_convention&idStage=<?= $profilStage->idStage ?>'" class="button is-link is-light is-small">Obtenir</button>
          <?php else: ?>
            -
          <?php endif; ?>
        </td>

        <td>
          <?php if(isset($profilStage->idStage)): ?>
            <button onclick="event.stopPropagation(); window.location.href='router.php?page=journal&idStage=<?= $profilStage->idStage ?>&idEtu=<?= $profilStage->idEtudiant ?>'" class="button is-link is-light is-small">Voir</button>
          <?php else: ?>
            -
          <?php endif; ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>


<style>

  table a, .is-selected{
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
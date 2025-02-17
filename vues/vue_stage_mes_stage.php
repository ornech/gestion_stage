<?php
require_once 'config/auth.php';
if (isset($stage)) :
 if ($_SESSION['statut'] == "Etudiant") :
?>

<div class="columns is-vcentered">
  <div class="column">
    <p class="title is-1">Mes stages</p>
    <p class="subtitle is-3"><?=$_SESSION["utilisateur"] ?></p>

  </div>
  <div class="column is-narrow">
    <?php if (!isset($stage[0]) && !isset($stage[1]) || !isset($stage[1])): ?>
      <a href="/router.php?page=stage_create_etu" class="button"> 
        <span class="icon has-text-primary">
          <i class="fas fa-plus-circle"></i>
        </span>
        &nbsp;&nbsp;Ajouter un stage
      </a>
    <?php endif ?> 
  </div>
</div>

<?php endif;
  foreach ($stage as $stageEtu):
    setlocale(LC_TIME, 'fr_FR.UTF-8');  //pour l'affichange de mois en francais
    $fmt = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE, 'Europe/Paris', IntlDateFormatter::GREGORIAN);

    $dateDebut = new DateTime($stageEtu->dateDebut);
    $dateFin = new DateTime($stageEtu->dateFin);
    $difference = $dateDebut->diff($dateFin); // (dateFin - dateDebut) -> difference en jour
    $semaines = floor($difference->days / 7); // difference en jour divisé sur 7
    $debutFormat = $fmt->format($dateDebut); //affichage les mois en lettre
    $finFormat = $fmt->format($dateFin);
?>
<div class="box">
  <p class="title is-2">Stage <?= $stageEtu->classe ?></p>
  <p>Entreprise: <a href="/router.php?page=fiche_entreprise&idEntreprise=<?= $stageEtu->idEntreprise ?>"><?= $stageEtu->Entreprise ?></a></p>
  <p>Durée : <strong><?= $semaines ?> semaines</strong></p>
  <p>Début du stage : <strong><?php echo $debutFormat; ?></strong></p>
  <p>Fin de stage : <strong><?php echo $finFormat; ?></strong></p>
  <div class="buttons mt-1"></div>
    <a href="/router.php?page=stage_convention&idStage=<?= $stageEtu->idStage ?>"><button class="button is-primary">Obtenir la convention</button></a>
    <a href="/router.php?page=journal&idStage=<?= $stageEtu->idStage ?>"><button class="button is-link">Journal de bord</button></a>
    <a href="/router.php?page=stage_read&id=<?= $stageEtu->idStage ?>&idEtudiant=<?= $stageEtu->idEtudiant ?>"><button class="button">Plus de détails</button></a>
  </div>
</div>

<?php
endforeach;
else:
  header("Location: /router.php");
endif;
?>

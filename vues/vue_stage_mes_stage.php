<?php
require_once 'config/auth.php';

// var_dump($stage);
if (isset($stage)) {
 if ($_SESSION['statut'] == "Etudiant") {
   //var_dump($_SESSION);
?>
<div class="columns is-vcentered">
  <div class="column">
    <p class="title is-1">Mes stages</p>
    <p class="subtitle is-3"><?=$_SESSION["utilisateur"] ?></p>

  </div>
  <div class="column is-narrow">
    <?php if (!isset($stage[0]) && !isset($stage[1]) || !isset($stage[1])) { ?>
      <a href="../router.php?page=stage_create" class="button"> 
  <span class="icon has-text-primary">
    <i class="fas fa-plus-circle"></i>
  </span>
  &nbsp;&nbsp;Ajouter un stage
</a>
    <?php } ?> 
  </div>
</div>

<?php if (isset($stage[0])) {
  setlocale(LC_TIME, 'fr_FR.UTF-8');  //pour l'affichange de mois en francais
  $fmt = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE, 'Europe/Paris', IntlDateFormatter::GREGORIAN);

  $dateDebut = new DateTime($stage[0]->dateDebut);
  $dateFin = new DateTime($stage[0]->dateFin);
  $difference = $dateDebut->diff($dateFin); // (dateFin - dateDebut) -> difference en jour
  $semaines = floor($difference->days / 7); // difference en jour divisé sur 7
  $debutFormat = $fmt->format($dateDebut); //affichage les mois en lettre
  $finFormat = $fmt->format($dateFin);
?>

<div class="box">
  <p class="title is-2">Stage <?= $stage[0]->classe ?></p>
  <p>Entreprise: <a href="../router.php?page=fiche_entreprise&idEntreprise=<?= $stage[0]->idEntreprise ?>"><?= $stage[0]->Entreprise ?></a></p>
  <p>Durée : <strong><?= $semaines ?> semaines </strong></p>
  <p>Début du stage : <strong><?php echo $debutFormat; ?></strong></p>
  <p>Fin de stage : <strong><?php echo $finFormat; ?></strong></p>
  <p>  <a href="../router.php?page=stage_read&id=<?= $stage[0]->idStage ?>&idEtudiant=<?= $stage[0]->idEtudiant ?>">+ de détails</a></p>
</div>
<?php } ?>

<?php }
 if (isset($stage[1])) {
   setlocale(LC_TIME, 'fr_FR.UTF-8');  //pour l'affichange de mois en francais
   $fmt = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE, 'Europe/Paris', IntlDateFormatter::GREGORIAN);

   $dateDebut = new DateTime($stage[1]->dateDebut);
   $dateFin = new DateTime($stage[1]->dateFin);
   $difference = $dateDebut->diff($dateFin); // (dateFin - dateDebut) -> difference en jour
   $semaines = floor($difference->days / 7); // difference en jour divisé sur 7
   $debutFormat = $fmt->format($dateDebut); //affichage les mois en lettre
   $finFormat = $fmt->format($dateFin);
?>
<div class="box">
  <p class="title is-2">Stage <?= $stage[1]->classe ?></p>
  <p>Entreprise: <a href="../router.php?page=fiche_entreprise&idEntreprise=<?= $stage[1]->idEntreprise ?>"><?= $stage[1]->Entreprise ?></a></p>
  <p>Durée : <strong><?= $semaines ?> semaines</strong></p>
  <p>Début du stage : <strong><?php echo $debutFormat; ?></strong></p>
  <p>Fin de stage : <strong><?php echo $finFormat; ?></strong></p>
  <p>  <a href="../router.php?page=stage_read&id=<?= $stage[1]->idStage ?>&idEtudiant=<?= $stage[1]->idEtudiant ?>">+ de détails</a></p>
</div>

<?php
    }
}
?>

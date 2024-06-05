<?php
require_once 'config/auth.php';

// var_dump($stage);
if (isset($stage)) {
 if ($_SESSION['statut'] == "Etudiant") {
   //var_dump($_SESSION);
?>
<p class="title is-1">Mes stages</p>
<p class="subtitle is-3"><?=$_SESSION["utilisateur"] ?></p>

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
  <p>Début du stage : <?php echo $debutFormat; ?></p>
  <p>Durée : <?= $semaines ?> semaines</p>
  <p>Fin de stage : <?php echo $finFormat; ?></p>
  <p>  <a href="http://gestage.localhost/router.php?page=stage_read&id=<?= $stage[0]->idStage ?>&idEtudiant=<?= $stage[0]->idEtudiant ?>">+ de détails</a></p>
</div>
<?php } ?>

<?php }
 if (isset($stage[1])) {
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
  <p class="title is-2">Stage <?= $stage[1]->classe ?></p>
  <p>Entreprise: <a href="../router.php?page=fiche_entreprise&idEntreprise=<?= $stage[1]->idEntreprise ?>"><?= $stage[1]->Entreprise ?></a></p>
  <p>Début du stage : <?php echo $debutFormat; ?></p>
  <p>Durée : <?= $semaines ?> semaines</p>
  <p>Fin de stage : <?php echo $finFormat; ?></p>
  <p>  <a href="http://gestage.localhost/router.php?page=stage_read&id=<?= $stage[1]->idStage ?>&idEtudiant=<?= $stage[1]->idEtudiant ?>">+ de détails</a></p>
</div>

<?php
    }
}
?>

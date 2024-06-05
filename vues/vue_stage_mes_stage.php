<?php
require_once 'config/auth.php';


var_dump($stage);

  // Vérifier si les détails du profil sont disponibles
  if (isset($stage)) {
    if ($_SESSION['statut'] == "Etudiant") {
   // $_SESSION["userID"]
   ?>

<!-- --------------- DEBUT ANCIENNE VUE ----------------------  -->

<?php
// setlocale(LC_TIME, 'fr_FR.UTF-8');  //pour l'affichange de mois en francais
// $fmt = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE, 'Europe/Paris', IntlDateFormatter::GREGORIAN);
//
// $dateDebut = new DateTime($stage->dateDebut);
// $dateFin = new DateTime($stage->dateFin);
// $difference = $dateDebut->diff($dateFin); // (dateFin - dateDebut) -> difference en jour
// $semaines = floor($difference->days / 7); // difference en jour divisé sur 7
// $debutFormat = $fmt->format($dateDebut); //affichage les mois en lettre
// $finFormat = $fmt->format($dateFin);
// $professeurs = $profilModel->list_by_professeur();

?>
<?php if ($stage[0]) {
  // code...
?>
<div class="box">
  <p class="title is-1">Stage <?= $stage[0]->classe ?></p>
  <p class="subtitle is-3"><?= $stage[0]->EtudiantNom ?> <?= $stage[0]->EtudiantPrenom ?></p>
</div>
<?php } ?>
<?php }
 if ($stage[1] != null) {
?>
<div class="box">
  <p class="title is-1">Stage <?= $stage[0]->classe ?></p>
  <p class="subtitle is-3"><?= $stage[0]->EtudiantNom ?> <?= $stage[0]->EtudiantPrenom ?></p>
</div>

  <?php
    }
else { echo "aucun stage" ;}
}
  ?>

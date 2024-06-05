<?php
require_once 'config/auth.php';

//ajouter session id =:id
if ($_GET["page"] == "stage_read" || $_GET["page"] == "stage") {

  // Vérifier si les détails du profil sont disponibles
  if (isset($stage)) {
    if ($_SESSION['statut'] == "Etudiant" && $idUser == $_SESSION["userID"]) {

      var_dump($stage);
?>

<!-- --------------- DEBUT ANCIENNE VUE ----------------------  -->

<?php
setlocale(LC_TIME, 'fr_FR.UTF-8');  //pour l'affichange de mois en francais
$fmt = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE, 'Europe/Paris', IntlDateFormatter::GREGORIAN);

$dateDebut = new DateTime($stage->dateDebut);
$dateFin = new DateTime($stage->dateFin);
$difference = $dateDebut->diff($dateFin); // (dateFin - dateDebut) -> difference en jour
$semaines = floor($difference->days / 7); // difference en jour divisé sur 7
$debutFormat = $fmt->format($dateDebut); //affichage les mois en lettre
$finFormat = $fmt->format($dateFin);
$professeurs = $profilModel->list_by_professeur();

?>
<!-- --------------- DEBUT NOUVELLE VUE ----------------------  -->




  <?php
    }
  } else {
    // Si aucun profil n'a été trouvée, afficher un message d'erreur
    echo "<p>Aucun profil trouvé avec ce lien.</p>";
  }
} else {
  header("Location: ../router.php?page=profil");
} //Fin de la vérification de si l'utilisateur est connecté en tant que prof
//
  ?>

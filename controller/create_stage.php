<?php
// Inclure le fichier qui définit la classe Entreprise
require_once '../model/Profil.php';

// Démarrer la session en premier
session_start();

// Vérifie si l'utilisateur est connecté
require_once '../config/auth.php';
require_once '../config/db_connection.php';

var_dump($_POST);
// Vérifie si le formulaire a été soumis
if(isset($_POST['idEntreprise'])) {
  // Récupération des données du formulaire
  $idEntreprise = $_POST['idEntreprise'];
  $idMaitreDeStage = $_POST['idMaitreDeStage'];
  $idEtudiant = $_POST['idEtudiant'];
  $classe = $_POST['classe'];
  $titreStage = $_POST['titreStage'];
  $description = $_POST['description'];
  $dateDebut = $_POST['dateDebut'];
  $dateFin = $_POST['dateFin'];

  // Création d'une instance de l'objet Stage
  $stage = new Stage($conn);

  // Appel de la méthode  de l'objet Stage
  if ($stage->create_stage($idEntreprise,$idMaitreDeStage,$idEtudiant,$classe,$titreStage,$description,$dateDebut,$dateFin)) {
    // Redirection vers la page de détails de l'entreprise après la mise à jour
    header("Location: ../router.php?page=gestion_etu");
    exit();
  } else {
    // Afficher un message d'erreur en cas d'échec de la mise à jour
    echo "Une erreur s'est produite.";
  }
} else {
  $message = "Veuillez réessayer tout en vérifiant si toutes les conditions obligatoires ont été rempli.";
  $titre = "Erreur lors que la création du stage !";
  header("Location: ../router.php?page=erreur&message=$message&titre=$titre");
  exit();
}
?>

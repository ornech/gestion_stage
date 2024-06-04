<?php
// Inclure le fichier qui définit la classe Entreprise
require_once '../model/Stage.php';

// Démarrer la session en premier
session_start();

// Vérifie si l'utilisateur est connecté
require_once '../config/auth.php';
require_once '../config/db_connection.php';

// Vérifie si le formulaire a été soumis
if(isset($_POST['idEntreprise']) && isset($_POST["idMaitreDeStage"]) && isset($_POST["idEtudiant"])){
  require_once '../controller/controller_log.php';

  // Récupération des données du formulaire
  $idEtudiant = $_POST['idEtudiant'];
  $idEntreprise = $_POST['idEntreprise'];
  $idMaitreDeStage = $_POST['idMaitreDeStage'];
  $classe = $_POST['classe'];
  $dateDebut = $_POST['dateDebut'];
  $duree = $_POST['duree'];

  // Création d'une instance de l'objet Stage
  $stage = new Stage($conn);

  //$oldValues = $stage->stage_by_id(ID_STAGE_A_METTRE)[0];

  // Appel de la méthode  de l'objet Stage
  if ($stage->edit_stage($idEtudiant,$idEntreprise,$idMaitreDeStage,$dateDebut,$duree)) {

    //$newValues = $stage->stage_by_id(ID_STAGE_A_METTRE)[0];

    //addLog($conn, 11, $_SESSION["userID"], "stage", ID_STAGE_A_METTRE, $oldValues, $newValues);

    // Redirection vers la page de détails de l'entreprise après la mise à jour
    if($classe == "SIO1"){
      header("Location: ../router.php?page=stage_sio1");
    } else if($classe == "SIO2"){
      header("Location: ../router.php?page=stage_sio2");
    }else{
      header("Location: ../router.php?page=fiche_entreprise&idEntreprise=" . $idEntreprise);
    }

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

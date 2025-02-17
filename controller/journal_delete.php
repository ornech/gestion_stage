<?php
// Démarrer la session en premier
require_once '../model/Journal.php';

session_start();

require_once '../config/auth.php';
require_once '../config/db_connection.php';
include_once "../controller/controller_log.php";


if(isset($_POST["idEtu"]) && isset($_POST["idStage"]) && isset($_POST["idRealisation"])){

  $idEtu = $_POST["idEtu"];
  $idStage = $_POST["idStage"];
  $idRealisation = $_POST["idRealisation"];

  if(($_SESSION["statut"] == "Etudiant" && $idEtu == $_SESSION["userID"]) || ($_SESSION["statut"] == "Professeur")){
    $journal = new Journal($conn);

    $oldValue = $journal->getRealisationsById($newJournalId)[0];

    if($journal->deleteRealisation($idRealisation)){
     
      addLog($conn, 21, $_SESSION["userID"], "journal", $idRealisation, $oldValue, null);

      // Redirection vers la page de détails de l'entreprise après la mise à jour
      if($_SESSION["statut"] == "Etudiant"){
        header("Location: ../router.php?page=journal&idStage=".$idStage);
        exit();
      }else if($_SESSION["statut"] == "Professeur"){
        header("Location: ../router.php?page=journal&idEtu=".$idEtu.'&idStage='.$idStage);
        exit();
      }
    }else{
      header("Location: ../router.php?page=erreur&message=Une erreur s'est produite lors de la création du journal !&titre=Erreur lors de la création du journal !");
    }
  }else{
    header("Location: ../router.php?page=erreur&message=Vous n'êtes pas autorisé à effectuer cette action !&titre=Erreur lors de la création du journal !");
  }
}else{
  header("Location: ../router.php?page=erreur&message=Veuillez remplir tous les champs obligatoires !&titre=Erreur lors de la création du journal !");
}
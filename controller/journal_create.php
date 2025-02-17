<?php
// Inclure le fichier qui définit la classe Entreprise
require_once '../model/Journal.php';

// Démarrer la session en premier
session_start();

require_once '../config/auth.php';
require_once '../config/db_connection.php';
include_once "../controller/controller_log.php";


if(isset($_POST["idEtudiant"]) && isset($_POST["idStage"]) && isset($_POST["semaine"]) && isset($_POST["titre"]) && isset($_POST["description"])){

  $idEtu = $_POST["idEtudiant"];
  $idStage = $_POST["idStage"];
  $semaine = (int)$_POST["semaine"];
  $titre = $_POST["titre"];
  $description = $_POST["description"];
  $competences = isset($_POST["competences"]) ? $_POST["competences"] : [];
  $competencesResult = 0;

  if(isset($_POST["competences"])){
    foreach($competences as $competence){
      $competencesResult += $competence;
    }
  }


  if($_SESSION["statut"] == "Etudiant" && $idEtu == $_SESSION["userID"]){
    $journal = new Journal($conn);

    if($journal->createRealisation($idEtu, $idStage, $semaine,  $competencesResult, $titre, $description)){
      $newJournalId = $conn->lastInsertId();
      $newValues = $journal->getRealisationsById($newJournalId)[0];

      addLog($conn, 20, $_SESSION["userID"], "journal", $newJournalId, null, $newValues);

      // Redirection vers la page de détails de l'entreprise après la mise à jour
      header("Location: ../router.php?page=journal");
      exit();
    }else{
      header("Location: ../router.php?page=erreur&message=Une erreur s'est produite lors de la création du journal !&titre=Erreur lors de la création du journal !");
    }
  }else{
    header("Location: ../router.php?page=erreur&message=Vous n'êtes pas autorisé à effectuer cette action !&titre=Erreur lors de la création du journal !");
  }
}else{
  header("Location: ../router.php?page=erreur&message=Veuillez remplir tous les champs obligatoires !&titre=Erreur lors de la création du journal !");
}
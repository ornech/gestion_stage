<?php
// Inclure le fichier qui définit la classe Entreprise
require_once '../model/Entreprise.php';

// Démarrer la session en premier
session_start();

// Vérifie si l'utilisateur est connecté
//echo __DIR__;
require_once '../config/auth.php';
require_once '../config/db_connection.php';

if(isset($_POST["nomEntreprise"]) && isset($_POST["entrepriseID"])){
  include_once "../controller/controller_log.php";

  $entreprise = new Entreprise($conn);
  $oldValue = $entreprise->read_fiche($_POST["entrepriseID"]);

  if($entreprise->updateNom($_POST["entrepriseID"], $_POST["nomEntreprise"])){
    $newValue = $entreprise->read_fiche($_POST["entrepriseID"]);
    addLog($conn, 4, $_SESSION['userID'], "Entreprise", $_POST["entrepriseID"], $oldValue, $newValue);
    header("Location: /router.php?page=fiche_entreprise&idEntreprise=". $_POST["entrepriseID"]);
    exit;
  }else{
    header("Location: /router.php?page=entreprise_liste&erreur=Erreur lors de la modification");
    exit;
  }
}else{
    header("Location: /router.php?page=entreprise_liste&erreur=Veuillez remplir tous les champs");
    exit;
}
?>
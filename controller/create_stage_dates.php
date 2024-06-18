<?php
session_start();
require_once "../config/auth.php";
require_once "../config/db_connection.php";

require_once "../model/Stage_Dates.php";

var_dump($_POST);
if (isset($_POST["nomClasse"]) && isset($_POST["promo"]) && isset($_POST["dateDebut"]) && isset($_POST["dateFin"])) {
  $stage_dates = new Stage_Dates($conn);
  $classe = $_POST["nomClasse"];
  $promo = $_POST["promo"];
  $dateDebut = $_POST["dateDebut"];
  $dateFin = $_POST["dateFin"];
  
  if($stage_dates->create($classe, $promo, $dateDebut, $dateFin)){
    header("Location: /router.php?page=gestion_classes");
  }else{
    header("Location: /router.php?page=erreur&titre=Erreur&message=Une erreur est survenue lors de la création des dates de stage...");
  }
  
  exit();
}
?>
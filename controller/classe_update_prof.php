<?php
session_start();
require_once "../config/auth.php";
require_once "../config/db_connection.php";

require_once "../model/Classe.php";

var_dump($_POST);
if(isset($_POST["idProfPrincipal"]) && isset($_POST["nomClasse"]) && isset($_POST["promo"]) && isset($_POST["nomProf"])){
  $classe = new Classe($conn);
  $nomClasse = $_POST["nomClasse"];
  $promo = $_POST["promo"];
  $idProfPrincipal = $_POST["idProfPrincipal"] != -1 ? $_POST["idProfPrincipal"] : null;
  $nomProf = $_POST["nomProf"];
  
  if($classe->updateProfPrincipal($nomClasse, $promo, $idProfPrincipal, $nomProf)){
    header("Location: /router.php?page=gestion_classes");
  }else{
    header("Location: /router.php?page=erreur&titre=Erreur&message=Une erreur est survenue lors de la mise à jour du professeur principal de la classe...");
  }
  exit();
}
?>
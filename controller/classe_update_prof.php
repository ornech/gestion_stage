<?php
session_start();
require_once "../config/auth.php";
require_once "../config/db_connection.php";

require_once "../model/Classe.php";

var_dump($_POST);
if(isset($_POST["idProfPrincipal"]) && isset($_POST["id"]) && isset($_POST["nomProf"])){
  $classe = new Classe($conn);
  $id = $_POST["id"];
  $idProfPrincipal = $_POST["idProfPrincipal"] != -1 ? $_POST["idProfPrincipal"] : null;
  $nomProf = $_POST["nomProf"];
  
  if($classe->updateProfPrincipal($id, $idProfPrincipal, $nomProf)){
    header("Location: /router.php?page=gestion_classes");
  }else{
    header("Location: /router.php?page=erreur&titre=Erreur&message=Une erreur est survenue lors de la mise à jour du professeur principal de la classe...");
  }
  exit();
}
?>
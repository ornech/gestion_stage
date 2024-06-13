<?php
session_start();

require_once '../config/auth.php';
require_once '../config/db_connection.php';

require_once '../model/Contact.php';
require_once '../model/Entreprise.php';

if(isset($_POST["idEntite"]) && isset($_POST["type"])){
  require_once '../controller/controller_log.php';
  $id = $_POST["idEntite"];

  if($_POST["type"] == "contact"){
    $contact = new Contact($conn);

    if($contact->valider_contact($id)) {

      addLog($conn, 14, $_SESSION["userID"], "contact", $id, NULL, NULL);

      header("Location: /router.php?page=valider_operation");
      exit();
    } else {
      header("Location: /router.php?page=erreur?title=Erreur de validation&message=Une erreur s'est produite lors de la validation du contact.");
    }
  }else if($_POST["type"] == "entreprise"){
    $entreprise = new Entreprise($conn);

    if($entreprise->valider_entreprise($id)) {
      addLog($conn, 16, $_SESSION["userID"], "entreprise", $id, NULL, NULL);

      header("Location: /router.php?page=valider_operation");
      exit();
    }
  }

}else{
    header("Location: /router.php?page=valider_operation");
}
?>

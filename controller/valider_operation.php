<?php
session_start();

require_once '../config/auth.php';
require_once '../config/db_connection.php';

require_once '../model/Contact.php';

if(isset($_POST["idEntite"]) && isset($_POST["type"])){
  require_once '../controller/controller_log.php';

  if($_POST["type"]){
    $id = $_POST["idEntite"];

    $contact = new Contact($conn);

    if($contact->valider_contact($id)) {

      addLog($conn, 14, $_SESSION["userID"], "contact", $id, NULL, NULL);

      header("Location: /router.php?page=valider_operation");
      exit();
    } else {
      header("Location: /router.php?page=erreur?title=Erreur de validation&message=Une erreur s'est produite lors de la validation du contact.");
    }
  }
  

}else{
    header("Location: /router.php?page=valider_operation");
}
?>

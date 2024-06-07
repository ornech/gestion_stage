<?php
session_start();

require_once '../config/auth.php';
require_once '../config/db_connection.php';

require_once '../model/Contact.php';

if(isset($_POST["idContact"])){
  require_once '../controller/controller_log.php';

  $id = $_POST["idContact"];

  $contact = new Contact($conn);

  if($contact->valider_contact($id)) {

    addLog($conn, 14, $_SESSION["userID"], "contact", $id, NULL, NULL);

    header("Location: /router.php?page=valider_operation");
    exit();
  } else {
      echo "Une erreur s'est produite.";
  }
}else{
    header("Location: /router.php?page=valider_operation");
}
?>

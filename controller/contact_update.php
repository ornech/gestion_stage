<?php


// Démarrer la session en premier
session_start();

// Vérifie si l'utilisateur est connecté
//echo __DIR__;
require_once '../config/auth.php';
require_once '../config/db_connection.php';
// Inclure le fichier qui définit la classe
require_once '../model/Contact.php';

var_dump($_POST);

if(isset($_POST["EmployeID"])){
  require_once '../controller/controller_log.php';

  $idContact = $_POST["EmployeID"];
  $email = $_POST["email"];
  $telephone = $_POST["telephone"];
  $fonction = $_POST["fonction"];
  $service = $_POST["service"];
  $Created_UserID = $_SESSION["userID"];

  $contact = new Contact($conn);

  $oldValue = $contact->read_fiche($idContact);

  if($contact->contact_update($idContact, $email, $telephone, $fonction, $service, $Created_UserID)) {

    $newValue = $contact->read_fiche($idContact);

    addLog($conn, 10, $Created_UserID, "contact", $idContact, $oldValue, $newValue);

    header("Location: ../router.php?page=Contact_fiche&idContact=$idContact");

      exit();
  } else {
      // Afficher un message d'erreur en cas d'échec de la mise à jour
      echo "Une erreur s'est produite.";
  }
}

?>

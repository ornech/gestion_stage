<?php


// Démarrer la session en premier
session_start();

// Vérifie si l'utilisateur est connecté
//echo __DIR__;
require_once '../config/auth.php';
require_once '../config/db_connection.php';
// Inclure le fichier qui définit la classe
require_once '../model/Contact.php';

if(isset($_POST["EmployeID"])){
  //require_once '../controller/controller_log.php';

  $idContact = $_POST["EmployeID"];
  $jury = $_POST["jury"];


  $contact = new Contact($conn);


  if($contact->contact_jury($idContact, $jury)) {

    // $newValue = $contact->read_fiche($idContact);

    // addLog($conn, 10, $Created_UserID, "contact", $idContact, $oldValue, $newValue);

    header("Location: ../router.php?page=comm_entreprise");

    exit();
  } else {
      // Afficher un message d'erreur en cas d'échec de la mise à jour
      echo "Une erreur s'est produite.";
  }
}

?>

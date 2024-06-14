<?php
session_start();
require_once '../config/auth.php';
require_once '../config/db_connection.php';

require_once '../model/Profil.php';
require_once '../model/Contact.php';
require_once '../model/Entreprise.php';
require_once '../model/Stage.php';

if(isset($_POST["userId"])){
  if(anonymizeUser($_POST["userId"])){
    header("Location: /router.php?page=gestion_etu");
    exit;
  }else{
    header("Location: /router.php?page=gestion_etu");
    exit;
  }
}

function anonymizeUser($id){
  global $conn;
  route_protect("Professeur");
  require_once '../controller/controller_log.php';

  //Anonymiser les id des utilisateurs raccordé created_userid de contact
  $contact = new Contact($conn);
  $entreprise = new Entreprise($conn);
  $stage = new Stage($conn);
  $profil = new Profil($conn);
  if($contact->anonymizeCreatedId($id) && $entreprise->anonymizeCreatedId($id) && $stage->anonymizeIdEtudiant($id) && $profil->deleteUser($id)) {

    addLog($conn, 13, $_SESSION["userID"], "profil", $id, null, null);
    return true;

  }else{
    return false;
  }
}
?>
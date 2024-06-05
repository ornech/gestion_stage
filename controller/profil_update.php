<?php


// Démarrer la session en premier
session_start();

// Vérifie si l'utilisateur est connecté
//echo __DIR__;
require_once '../config/auth.php';
require_once '../config/db_connection.php';
// Inclure le fichier qui définit la classe
require_once '../model/Profil.php';

if(isset($_POST["id"])){
  require_once '../controller/controller_log.php';

  $id = $_POST["id"];
  $email = $_POST["email"];
  $telephone = $_POST["telephone"];

  $profil = new Profil($conn);

  $oldValues = $profil->read_profil($id);

  if($profil->profil_update($id, $email, $telephone)) {

    $newValues = $profil->read_profil($id);

    addLog($conn, 12, $_SESSION["userID"], "profil", $id, $oldValues, $newValues);

    if($id == $_SESSION["userID"]){
      header("Location: /router.php?page=profil");
    }else{
      header("Location: /router.php?page=view_profil&id=$id");
    }
    

    exit();
  } else {
      // Afficher un message d'erreur en cas d'échec de la mise à jour
      echo "Une erreur s'est produite.";
  }
}

?>

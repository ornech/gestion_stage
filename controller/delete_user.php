<?php
session_start();
require_once '../config/auth.php';
require_once '../config/db_connection.php';

require_once '../model/Profil.php';

if(isset($_POST["userId"])){
  route_protect("Professeur");
  require_once '../controller/controller_log.php';

  $id = $_POST["userId"];

  $profil = new Profil($conn);

  if($profil->deleteUser($id)) {

    addLog($conn, 13, $_SESSION["userID"], "profil", $id, null, null);

    header("Location: /router.php?page=gestion_etu");
    
    exit();
  } else {
      // Afficher un message d'erreur en cas d'échec de la mise à jour
      header("Location: /router.php?page=erreur?title=Erreur de suppression&message=Une erreur s'est produite lors de la suppression de l'utilisateur.");
  }
}

?>

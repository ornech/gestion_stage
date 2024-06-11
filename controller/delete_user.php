<?php
session_start();
require_once '../config/auth.php';
require_once '../config/db_connection.php';

require_once '../model/Profil.php';
require_once '../model/Contact.php';
require_once '../model/Entreprise.php';
require_once '../model/Stage.php';

if(isset($_POST["userId"])){
  route_protect("Professeur");
  require_once '../controller/controller_log.php';
  $id = $_POST["userId"];

  //Anonymiser les id des utilisateurs raccordé created_userid de contact
  $contact = new Contact($conn);
  if($contact->anonymizeCreatedId($id)) {
    
    //Anonymiser les id des utilisateurs raccordé created_userid d'entreprise
    $entreprise = new Entreprise($conn);
    if($entreprise->anonymizeCreatedId($id)) {
      
      //Anonymiser les id des utilisateurs raccordé created_userid de stage
      $stage = new Stage($conn);
      if($stage->anonymizeIdEtudiant($id)) {

        //Suppression du profil
        $profil = new Profil($conn);
        if($profil->deleteUser($id)) {

          addLog($conn, 13, $_SESSION["userID"], "profil", $id, null, null);

          header("Location: /router.php?page=gestion_etu");
          
          exit();
        } else {
            // Afficher un message d'erreur en cas d'échec de la mise à jour
            header("Location: /router.php?page=erreur?title=Erreur de suppression&message=Une erreur s'est produite lors de la suppression de l'utilisateur.");
            exit();
        }
        
      }else{
        header("Location: /router.php?page=erreur?title=Erreur de suppression&message=Une erreur s'est produite lors de l'anonymisation des stages.");
        exit();
      }

    }else{
      header("Location: /router.php?page=erreur?title=Erreur de suppression&message=Une erreur s'est produite lors de l'anonymisation des entreprises.");
      exit();
    }

  }else{
    header("Location: /router.php?page=erreur?title=Erreur de suppression&message=Une erreur s'est produite lors de l'anonymisation des contacts.");
    exit();
  }

}

?>

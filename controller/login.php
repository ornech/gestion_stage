<?php
require_once '../config/db_connection.php';

include_once '../model/Login.php';
include_once '../model/Profil.php';

if(isset($_POST["login"]) && isset($_POST["password"])){ 
    $login = $_POST['login'];
    $password = $_POST['password'];

    $modelLogin = new Login($conn);
    $connexion = $modelLogin->login($login, $password);

    if($connexion["statut"] == "failed"){
        header("Location: /router.php?page=login&erreur=" . $connexion['message']);
        exit;
    }else{
      
      if($_SESSION['statut'] == "Professeur"){
        include_once 'verif_etudiant.php';
        include_once 'delete_user.php';
        
        $profil = new Profil($conn);
        $etudiants = $profil->list_by_etudiant();

        foreach($etudiants as $etudiant){
          verifEtu($etudiant, $conn);

          //Si $etudiant->dateFirstConn est passé depuis plus de 5 ans ou plus, si oui on l'anonymise
          if(isset($etudiant->dateFirstConn) && $etudiant->dateFirstConn != "" || $etudiant->dateFirstConn != null){
            $dateFirstConn = new DateTime($etudiant->dateFirstConn);
            $date_now = new DateTime();
            $interval = $dateFirstConn->diff($date_now);
            if($interval->y >= 5){
              if(!anonymizeUser($etudiant->id)){
                echo "error";
              }
            }
          }
        }
      }

      header("Location: /router.php?page=accueil");
      exit;
    }

}else{
    header("Location: /router.php?page=login&erreur=Veuillez remplir tous les champs");
    exit;
}
?>
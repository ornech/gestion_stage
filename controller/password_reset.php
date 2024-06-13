<?php
require_once '../config/db_connection.php';
include_once '../model/Login.php';

if(isset($_POST["userId"]) && isset($_POST["new_password"]) && isset($_POST["confirm_password"])){ 
  require_once '../controller/controller_log.php';
  
    $userId = $_POST['userId'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if($newPassword != $confirmPassword){
        header("Location: /router.php?page=password_reset&erreur=Les mots de passe ne correspondent pas");
        exit;
    }

    if(strlen($newPassword) < 6){
        header("Location: /router.php?page=password_reset&erreur=Le mot de passe doit contenir au moins 6 caractères");
        exit;
    }

    $modelLogin = new Login($conn);
    $connexion = $modelLogin->password_reset($userId, $newPassword);

    if($connexion["statut"] == "failed"){
        header("Location: /router.php?page=password_reset&erreur=" . $connexion['message']);
        exit;
    }else{
        addLog($conn, 19, $_SESSION['userID'], $_SESSION['userID'], "Profil", null, null);
        exit;
        header("Location: /router.php?page=accueil");
        exit;
    }

}else{
    header("Location: /router.php?page=password_reset&erreur=Veuillez remplir tous les champs");
    exit;
}
?>
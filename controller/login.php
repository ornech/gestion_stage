<?php
require_once '../config/db_connection.php';

include_once '../model/Login.php';

if(isset($_POST["login"]) && isset($_POST["password"])){ 
    $login = $_POST['login'];
    $password = $_POST['password'];

    $modelLogin = new Login($conn);
    $connexion = $modelLogin->login($login, $password);

    if($connexion["statut"] == "failed"){
        header("Location: /router.php?page=login&erreur=" . $connexion['message']);
        exit;
    }else{
        header("Location: /router.php?page=accueil");
        exit;
    }

}else{
    header("Location: /router.php?page=login&erreur=Veuillez remplir tous les champs");
    exit;
}
?>
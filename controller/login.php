<?php
require_once '../config/db_connection.php';

include_once '../model/Login.php';

if(isset($_POST["login"]) && isset($_POST["password"])){
    $login = $_POST['login'];
    $password = $_POST['password'];

    $login = new Login($conn);
    $connexion = $login->login($login, $password);

    if($connexion != true){
        header("Location: router.php?page=login&erreur=$connexion");
        exit;
    }else{
        header("Location: router.php?page=accueil");
        exit;
    }

}else{
    header("Location: router.php?page=login&erreur=Veuillez remplir tous les champs");
    exit;
}
?>
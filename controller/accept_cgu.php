<?php
session_start();
require_once '../config/db_connection.php';

include_once '../model/Login.php';

if(isset($_POST["id"]) && isset($_POST["cgu_accepte"])){ 
  if($_SESSION['id'] != $id){
    header("Location: /router.php?page=login&erreur=Erreur lors de l'acceptation des CGU");
    exit;
  }
  
  $id = $_POST['id'];
  var_dump($_POST);

  $modelLogin = new Login($conn);

  if($modelLogin->accepte_cgu($id)){
    unset($_SESSION["CGU"]);
    header("Location: /router.php?page=accueil");
    exit;
  }else{
    header("Location: /router.php?page=login&erreur=Erreur lors de l'acceptation des CGU");
    exit;
  }

}else{
  header("Location: /router.php?page=login");
  exit;
}
?>
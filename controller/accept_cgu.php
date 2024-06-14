<?php
require_once '../config/db_connection.php';

include_once '../model/Login.php';

if(isset($_POST["id"]) && isset($_POST["cgu_accepte"])){ 
  $id = $_POST['id'];
  var_dump($_POST);

  $modelLogin = new Login($conn);

  if($modelLogin->accepte_cgu($id)){
    header("Location: /");
    exit;
  }

}else{
  header("Location: /router.php?page=login");
  exit;
}
?>
<?php
require_once "config/auth.php";
require_once "config/db_connection.php";

require_once "model/Classe.php";
require_once "controller/verifications.php";

function getClasses($conn){
  $classe = new Classe($conn);
  $classes = $classe->list();

  $result = array("actuelles" => [], "anciennes" => []);

  foreach($classes as $classe){
    $promo = assignPromoByClasse($classe->nomClasse);

    if($promo == $classe->promo){
      array_push($result["actuelles"], $classe);
    }else{
      array_push($result["anciennes"], $classe);
    }
  }
  return $result;
}

?>
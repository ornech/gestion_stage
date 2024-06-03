<?php
// Inclure le fichier qui définit la classe Entreprise
require_once 'model/Activite.php';


// Vérifie si l'utilisateur est connecté
require_once 'config/auth.php';
require_once 'config/db_connection.php';

function addActivite($idActiviteType, $idUser, $action_type, $entite_type = null, $entite_id = null, $old_values = null, $new_values = null) {
  $activite = new Activite($conn);
  var_dump($activite);

  if($idActiviteType == null || $idUser == null || $action_type == null) {
    return false;
  }

  $new_values = json_encode($new_values);
  $old_values = json_encode($old_values);

  var_dump($new_values);
  var_dump($old_values);

  if ($activite->create($idActiviteType, $idUser, $action_type, $entite_type, $entite_id, $old_values, $new_values)) {
    return true;
  } else {
    return false;
  }

}

?>

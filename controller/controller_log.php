<?php
// Vérifie si l'utilisateur est connecté
require_once '../config/auth.php';
require_once '../config/db_connection.php';

// Inclure le fichier qui définit la classe Entreprise
require_once '../model/Log.php';

function addLog($conn, $idActiviteType, $idUser, $entite_type = null, $entite_id = null, $old_values = null, $new_values = null) {
  $activite = new Log($conn);

  if($idActiviteType == null || $idUser == null || $conn == null) {
    return false;
  }

  $new_values = json_encode($new_values);
  $old_values = json_encode($old_values);

  // Call the create method
  if ($activite->create($idActiviteType, $idUser, $entite_type, $entite_id, $old_values, $new_values)) {
    return true;
  } else {
    return false;
  }

}

?>

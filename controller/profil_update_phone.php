<?php
session_start();

// Vérifie si l'utilisateur est connecté
require_once '../config/auth.php';
require_once '../config/db_connection.php';

require_once '../model/Profil.php';

if (isset($_POST['id']) && isset($_POST['telephone']) && ($_SESSION["statut"] == "Etudiant" && $idEtu == $_SESSION["userID"]) || ($_SESSION["statut"] == "Professeur")) {
  include "../controller/controller_log.php";
  $profil = new Profil($conn);

  $id = $_POST['id'];
  $telephone = $_POST['telephone'];
  $oldValues = $profil->read_profil($id);

  if ($profil->update_phone($id, $telephone)) {
    $newValues = $profil->read_profil($id);
    addLog($conn, 12, $_SESSION['userID'], "profil", $id, $oldValues, $newValues);
    if ($_SESSION['statut'] == "Etudiant") {
      header("Location: /router.php?page=profil");
    } else {
      header("Location: /router.php?page=view_profil&id=" . $id);
    }
  } else {
    echo "Erreur lors de la mise à jour du téléphone";
  }
} else {
  echo "Erreur lors de la récupération des données";
}

?>
<?php
// Inclure le fichier qui définit la classe Entreprise
require_once '../model/Stage.php';

// Démarrer la session en premier
session_start();

// Vérifie si l'utilisateur est connecté
//echo __DIR__;
require_once '../config/auth.php';
require_once '../config/db_connection.php';

if(isset($_POST["submit"])){
    include_once "../controller/controller_log.php";

    $idStage = $_POST["Stage"];
    $idProfesseur = $_POST["Professeur"];

    $stage = new Stage($conn);

    $oldValues = $stage->stage_by_id($idStage);
    if($stage->assignation_suivi($idStage, $idProfesseur)){
        header("Location: ../router.php?page=fiche_entreprise&idEntreprise=" . $idEntreprise);
        exit();
    } else {
        // Afficher un message d'erreur en cas d'échec de la mise à jour
        echo "Une erreur s'est produite.";
    }
}

?>

<?php
session_start();

// Vérifie si l'utilisateur est connecté
require_once '../config/auth.php';
require_once '../config/db_connection.php';

require_once '../model/Profil.php';

if(isset($_POST['id']) && isset($_POST['classe'])) {
    include "../controller/controller_log.php";
    include "../controller/verif_etudiant.php";
    $profil = new Profil($conn);

    $id = $_POST['id'];
    $classe = $_POST['classe'];
    $oldValues = $profil->read_profil($id);

    $promoSelected = assignPromoByClasse($classe);

    if($profil->update_promo($id, $promoSelected)) {
        verifEtu($profil->read_profil($id), $conn);

        $newValues = $profil->read_profil($id);
        addLog($conn, 12, $_SESSION['userID'], "profil", $id, $oldValues, $newValues);
        header("Location: /router.php?page=view_profil?id=".$id);
    } else {
        echo "Erreur lors de la mise à jour de la classe";
    }
} else {
    echo "Erreur lors de la récupération des données";
}

?>
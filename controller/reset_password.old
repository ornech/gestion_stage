<?php
// Démarrer la session en premier
session_start();

// Vérifie si l'utilisateur est connecté
require_once '../config/auth.php';
require_once '../config/db_connection.php';
require_once '../model/Profil.php';

// Vérifie si le formulaire a été soumis
if(isset($_POST['Reset'])) {
    // Récupération des données du formulaire
    $idProfil = $_GET['idProfil'];

    // Création d'une instance de l'objet Profil
    $reset = new Profil($conn);

    // Tableau contenant les nouvelles données
    $nouvelles_infos = array(
        'password_reset' => "1",
    );

    // Appel de la méthode reset_password de l'objet reset
    if ($reset->reset_password($idProfil)) {
        // Redirection vers la page index après la mise à jour
        header("Location: index.php");
        exit();
    } else {
        // Afficher un message d'erreur en cas d'échec de la mise à jour
        echo "Une erreur s'est produite lors de la mise à jour.";
    }
} else {
    // Rediriger vers une page d'erreur si le formulaire n'a pas été soumis
    // header("Location: vue_erreur.php");
    echo "<BR>Erreur ... ";
    exit();
}
?>

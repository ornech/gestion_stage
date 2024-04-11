<?php
// fichier index.php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    // Rediriger vers la page de connexion
    header("Location: login.php");
    exit;
}

// Inclure le routeur
require_once 'router.php';

?>

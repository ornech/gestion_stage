<?php
// fichier index.php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['username']) && $page != 'login') {
    // Rediriger vers la page de connexion
    header("Location: /router.php?page=login");
    exit;
}

// Inclure le routeur
require_once 'router.php';

?>

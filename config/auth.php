<?php
// Fichier: config/auth.php

// Vérifie si aucune session n'est démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Vérifie si l'utilisateur n'est pas connecté
if (!isset($_SESSION['logged_in'])) {
    // Redirige vers la page de connexion
    header("Location: login.php");
    exit(); // Assurez-vous de quitter le script après la redirection
}
?>

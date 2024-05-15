<?php
// Fichier: config/auth.php

// Vérifie si aucune session n'est démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Vérifie si l'utilisateur n'est pas connecté
if (!isset($_SESSION['username'])) {
    // Redirige vers la page de connexion
    header("Location: ../login.php");
    exit();
}

// Limitez la durée de validité de la session
$session_duration = 86400; // Durée de validité de la session en secondes (ici, 1 jour)
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $session_duration) {
  // Déconnectez l'utilisateur si la session a expiré
  session_unset();
  session_destroy();
  // Redirigez l'utilisateur vers la page de connexion
  header("Location: login.php");
  exit();
}

// Mettez à jour le timestamp de dernière activité
$_SESSION['last_activity'] = time();

?>

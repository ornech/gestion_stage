<?php
// Fichier: config/auth.php

// Vérifie si aucune session n'est démarrée


// Vérifie si l'utilisateur n'est pas connecté
if (!isset($_SESSION['username']) && $page != 'login') {
  // Redirige vers la page de connexion
  header("Location: /router.php?page=login");
  exit();
}

// Limitez la durée de validité de la session
$session_duration = 86400; // Durée de validité de la session en secondes (ici, 1 jour)
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $session_duration && $page != 'login') {
  // Déconnectez l'utilisateur si la session a expiré
  session_unset();
  session_destroy();
  // Redirigez l'utilisateur vers la page de connexion
  header("Location: /router.php?page=login");
  exit();
}

// Mettez à jour le timestamp de dernière activité
$_SESSION['last_activity'] = time();

function route_protect($requiredRole) {
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if (!isset($_SESSION['statut']) || $_SESSION['statut'] !== $requiredRole) {
    header('Location: ../router.php?page=erreur&titre=Non autorisé !&message=Vous n\'êtes pas autorisé à accéder à cette URL...');
    exit();
  }
}

?>

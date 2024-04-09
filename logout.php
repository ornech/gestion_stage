<?php
session_start();

// Détruire la session utilisateur
session_destroy();

// Rediriger l'utilisateur vers la page de connexion
header("Location: login.php");
exit;
?>

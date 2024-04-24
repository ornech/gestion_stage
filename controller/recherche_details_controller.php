<?php
// recherche_controller.php
session_start();

// Vérifie si l'utilisateur est connecté
//echo __DIR__;
require_once '../config/auth.php';
include 'vues/vue_recherche_details.php';

require_once '../model/recherche.php';

// Récupérer les valeurs sélectionnées (s'il y en a)
if(isset($_GET['submit'])) {
  $siret = isset($_GET['siret']) ? $_GET['siret'] : null;

  // Créer une instance de la classe Recherche
  $recherche = new Recherche();

  // Appeler la méthode recherche
  $resultats = $recherche->detail($siret);


  exit();
} else {
  // Rediriger vers une page d'erreur si le formulaire n'a pas été soumis
  // header("Location: vue_erreur.php");
  echo "<BR>Erreur ... ";
  echo var_dump($resultats);
  exit();
}
?>

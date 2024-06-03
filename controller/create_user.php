<?php
// Inclure le fichier qui définit la classe Entreprise
require_once '../model/Profil.php';

// Démarrer la session en premier
session_start();

// Vérifie si l'utilisateur est connecté
//echo __DIR__;
require_once '../config/auth.php';
require_once '../config/db_connection.php';

// ($nom,$prenom,$email,$telephone,$promo,$login,$password,$statut)
var_dump($_POST);
// Vérifie si le formulaire a été soumis
if(isset($_POST['nom'])) {
  // Récupération des données du formulaire
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $telephone = $_POST['telephone'];
  $promo = $_POST['promo'];
  $spe = $_POST['spe'];
  $login = $_POST['login'];
  $password = password_hash("achanger", PASSWORD_DEFAULT);
  $statut = $_POST['statut'];
  $dateEntree = $_POST['dateEntree'];

  // Création d'une instance de l'objet Entreprise
  $profil = new Profil($conn);

  // Appel de la méthode  de l'objet Profil
  if ($profil->create_user($nom,$prenom,$email,$telephone,$promo,$spe,$login,$password,$statut,$dateEntree)) {
    // Redirection vers la page de détails de l'entreprise après la mise à jour
    header("Location: ../router.php?page=gestion_etu");
    exit();
  } else {
    // Afficher un message d'erreur en cas d'échec de la mise à jour
    echo "Une erreur s'est produite.";
  }
} else {
  // Rediriger vers une page d'erreur si le formulaire n'a pas été soumis
  // header("Location: vue_erreur.php");
  echo "<BR>Erreur ... ";
  exit();
}
?>

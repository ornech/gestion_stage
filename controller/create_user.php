<?php
// Inclure le fichier qui définit la classe Entreprise
require_once '../model/Profil.php';

// Démarrer la session en premier
session_start();

// Vérifie si l'utilisateur est connecté
//echo __DIR__;
require_once '../config/auth.php';
require_once '../config/db_connection.php';
require_once '../controller/verifications.php';

// ($nom,$prenom,$email,$telephone,$promo,$login,$password,$statut)
var_dump($_POST);
// Vérifie si le formulaire a été soumis
if(isset($_POST['nom'])) {
  require_once '../controller/controller_log.php';

  // Récupération des données du formulaire
  $nom = strtoupper($_POST['nom']);
  $prenom = ucfirst(strtolower($_POST['prenom']));
  $email = $_POST['email'];
  $telephone = $_POST['telephone'];
  $promo = $_POST['promo'];
  $spe = $_POST['spe'];
  $login = $_POST['login'];
  $password = password_hash("achanger", PASSWORD_DEFAULT);
  $statut = $_POST['statut'];
  $dateEntree = $_POST['dateEntree'];

  // Création d'une instance de l'objet u
  $profil = new Profil($conn);

  // Appel de la méthode  de l'objet Profil
  if ($profil->create_user($nom,$prenom,$email,$telephone,$promo,$spe,$login,$password,$statut,$dateEntree)) {

    // Récupération de l'étudiant nouvellement créée
    $newValue = $profil->read_profil($conn->lastInsertId());

    // Compléter les informations de l'étudiant nouvellement créée
    verifUser($newValue, $conn);

    // Actualisation des valeurs
    $newValue = $profil->read_profil($newValue->id);

    if($newValue->statut == "Etudiant"){
      verifClasseCount($newValue->classe, $conn);
    }
    
    addLog($conn, 1, $_SESSION["userID"], 'profil', $newValue->id, null, $newValue);
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

<?php
// Inclure le fichier qui définit la classe Entreprise
require_once '../model/Contact.php';

// Démarrer la session en premier
session_start();

// Vérifie si l'utilisateur est connecté
//echo __DIR__;
require_once '../config/auth.php';
require_once '../config/db_connection.php';

var_dump($_SESSION);
var_dump($_POST);

if(isset($_POST["submit"])){
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $fonction = $_POST["fonction"];

    $idEntreprise = $_POST["idEntreprise"];
    $Created_UserID = $_SESSION["userID"];

    $contact = new Contact($conn);

    if($contact->create_contact($nom, $prenom, $email, $telephone, $fonction, $idEntreprise, $Created_UserID)){
        header("Location: ../router.php?page=fiche_entreprise&idEntreprise=" . $idEntreprise);
        exit();
    } else {
        // Afficher un message d'erreur en cas d'échec de la mise à jour
        echo "Une erreur s'est produite.";
    }
}

?>
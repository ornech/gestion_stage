<?php
// Inclure le fichier qui définit la classe Entreprise
require_once '../model/Entreprise.php';

// Démarrer la session en premier
session_start();

// Vérifie si l'utilisateur est connecté
//echo __DIR__;
require_once '../config/auth.php';
require_once '../config/db_connection.php';

// Assurez-vous que l'utilisateur est connecté en tant que professeur
//if (!isset($_SESSION['statut']) || $_SESSION['statut'] !== 'Professeur') {
    // Rediriger vers une page d'erreur ou une page d'accueil
    //header("Location: erreur.php");
//    echo "L'utilisateur n'a pas les autorisations nécessaires pour les modification";
//    exit();
//}

// Vérifie si le formulaire a été soumis
if(isset($_POST['idEntreprise'])) {
    // Récupération des données du formulaire
    $idEntreprise = $_POST['idEntreprise'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $tel = $_POST['tel'];
    $codePostal = $_POST['codePostal'];
    $indice_fiabilite = $_POST['indice_fiabilite'];

    // Création d'une instance de l'objet Entreprise
    $entreprise = new Entreprise($conn);

    // Tableau contenant les nouvelles informations de l'entreprise
    $nouvelles_infos = array(
        'nom' => $nom,
        'adresse' => $adresse,
        'ville' => $ville,
        'tel' => $tel,
        'codePostal' => $codePostal,
        //'indice_fiabilite' => $indice_fiabilite
    );

    // Appel de la méthode update de l'objet Entreprise pour mettre à jour les informations
    if ($entreprise->update($idEntreprise, $nouvelles_infos)) {
        // Redirection vers la page de détails de l'entreprise après la mise à jour
        header("Location: ../router.php?page=fiche_entreprise&idEntreprise=$idEntreprise");
        exit();
    } else {
        // Afficher un message d'erreur en cas d'échec de la mise à jour
        echo "Une erreur s'est produite lors de la mise à jour des informations de l'entreprise.";
    }
} else {
    // Rediriger vers une page d'erreur si le formulaire n'a pas été soumis
    // header("Location: vue_erreur.php");
    echo "<BR>Erreur ... ";
    exit();
}
?>
<?php
// Inclure le fichier qui définit la classe Entreprise
require_once '../model/Entreprise.php';

// Démarrer la session en premier
session_start();

// Vérifie si l'utilisateur est connecté
//echo __DIR__;
require_once '../config/auth.php';
require_once '../config/db_connection.php';

// Initialisation de $entrepriseData avec des valeurs par défaut
$entrepriseData = array(
    'nomEntreprise' => '',
    'adresse' => '',
    'ville' => '',
    'tel' => '',
    'codePostal' => '',
    'Created_UserID' => '',
    'Created_Date' => '',
    'dep_geo' => '',
    'code_ape' => '',
    'effectif' => ''
);

// Vérifie si le formulaire a été soumis
if(isset($_POST['submit'])) {
    // Récupération des données du formulaire
    $nomEntreprise = $_POST['nomEntreprise'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $tel = $_POST['tel'];
    $codePostal = $_POST['codePostal'];
    $dep_geo = $_POST['dep_geo'];
    $code_ape = $_POST['code_ape'];
    $effectif = $_POST['effectif'];

    // Création d'un objet DateTime pour l'instant présent
    $date = new DateTime();

    // Mettre à jour les valeurs de $entrepriseData avec les données du formulaire et l'instant présent
    $entrepriseData = array(
        'nomEntreprise' => $nomEntreprise,
        'adresse' => $adresse,
        'ville' => $ville,
        'tel' => $tel,
        'codePostal' => $codePostal,
        'Created_UserID' => $_SESSION['userID'],
        'Created_Date'=> $date->format('Y-m-d H:i:s'),
        'dep_geo' => $dep_geo,
        'code_ape' => $code_ape,
        'effectif' => $effectif
        //'indice_fiabilite' => $indice_fiabilite
    );

    // Création d'une instance de l'objet Entreprise
    $entreprise = new Entreprise($conn);

    // Appel de la méthode update de l'objet Entreprise pour mettre à jour les informations
    if ($entreprise->create($entrepriseData)) {
        // Redirection vers la page de détails de l'entreprise après la mise à jour
        //header("Location: ../router.php?page=fiche_entreprise&idEntreprise=$idEntreprise");
        echo var_dump($entrepriseData);
        exit();
    } else {
        // Afficher un message d'erreur en cas d'échec de la mise à jour
        echo "Une erreur s'est produite lors de la mise à jour des informations de l'entreprise.";
    }
} else {
    // Rediriger vers une page d'erreur si le formulaire n'a pas été soumis
    // header("Location: vue_erreur.php");
    echo "<BR>Erreur ... ";
    echo var_dump($entrepriseData);
    exit();
}
?>

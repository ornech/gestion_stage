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
  'adresse2' => '',
  'ville' => '',
  'tel' => '',
  'codePostal' => '',
  'dep_geo' => '',
  'siret' => '',
  'naf' => '',
  'effectif' => '',
  'type' => '',
  'Created_UserID' => '',
  'Created_Date'=> ''
);

// Vérifie si le formulaire a été soumis
if(isset($_POST['submit'])) {
    // Récupération des données du formulaire
    $nomEntreprise = $_POST['nomEntreprise'];
    $adresse = $_POST['adresse'];
    $adresse2 = empty($_POST['adresse2']) ? $_POST['adresse2'] : NULL;
    $ville = $_POST['ville'];
    $tel = empty($_POST['tel']) ? $_POST['tel'] : NULL;
    $codePostal = $_POST['codePostal'];
    $dep_geo = substr($_POST['codePostal'], 0, 2);
    $siret =  $_POST['siret'];
    $naf = substr($_POST['naf'], 0 , 6);
    $effectif = $_POST['effectif'];
    $type = $_POST['type'];


    // Création d'un objet DateTime pour l'instant présent
    $date = new DateTime();

    // Mettre à jour les valeurs de $entrepriseData avec les données du formulaire
    $entrepriseData = array(
        'nomEntreprise' => $nomEntreprise,
        'adresse' => $adresse,
        'adresse2' => $adresse2,
        'ville' => $ville,
        'tel' => $tel,
        'codePostal' => $codePostal,
        'dep_geo' => $dep_geo,
        'siret' => $siret,
        'naf' => $naf,
        'effectif' => $effectif,
        'type' => $type,
        'Created_UserID' => $_SESSION['userID'],
        'Created_Date'=> $date->format('Y-m-d H:i:s')
    );

    // var_dump($entrepriseData);
    // Création d'une instance
    $entreprise = new Entreprise($conn);

    // Appel de la méthode ajouter de l'objet entreprise
    if ($entreprise->importer($entrepriseData)) {
        //echo var_dump($entrepriseData);
        header("Location: ../router.php?page=listerEntreprises");
        exit();

    } else {
        // Afficher un message d'erreur en cas d'échec de la mise à jour
        echo "Une erreur s'est produite avec le model: "  . $_SERVER['SCRIPT_NAME'];
    }
} else {
    // Rediriger vers une page d'erreur si le formulaire n'a pas été soumis
    // header("Location: vue_erreur.php");
    echo "<BR>Erreur ... ";
    echo var_dump($entrepriseData);
    exit();
}
?>

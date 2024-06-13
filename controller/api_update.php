<?php
// Inclure le fichier qui définit la classe Entreprise
require_once '../model/Entreprise.php';

// Démarrer la session en premier
session_start();

// Vérifie si l'utilisateur est connecté
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
if (isset($_POST['EntrepriseID'])) {
  // Récupération des données du formulaire
  $EntrepriseID = $_POST['EntrepriseID'];
  var_dump($EntrepriseID);
  $siret = isset($_POST['siret']) ? $_POST['siret'] : null; // Vérification si 'siret' est défini

  var_dump($siret);
  // Création d'une instance
  $entreprise = new Entreprise($conn);

  // Appel de la méthode ajouter de l'objet entreprise
  if ($entreprise->update_api($EntrepriseID, $siret)) { // Ajout de la parenthèse fermante manquante
      header("Location: ../router.php?page=fiche_entreprise&idEntreprise=" . $EntrepriseID);
      exit();
  } else {
      // Afficher un message d'erreur en cas d'échec de la mise à jour
      echo "Une erreur s'est produite avec le model: "  . $_SERVER['SCRIPT_NAME'];
  }
} else {
  // Rediriger vers une page d'erreur si le formulaire n'a pas été soumis
  header("Location: ../router.php?page=fiche_entreprise&idEntreprise=" . $_POST['EntrepriseID']);
  exit();
}
?>

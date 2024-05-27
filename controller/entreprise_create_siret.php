<?PHP
// Controlleur
session_start();

// Vérifie si l'utilisateur est connecté
//echo __DIR__;
require_once '../config/auth.php';
require_once '../model/Entreprise.php';
require_once '../config/db_connection.php';


// Récupérer les valeurs sélectionnées (s'il y en a)
if(isset($_GET['siret'])) {
  $siret = isset($_GET['siret']) ? $_GET['siret'] : null;

  // Créer une instance de la classe Recherche
  $entreprise = new Entreprise($conn);

  // Appeler la méthode recherche
  if ($entreprise->entreprise_create_siret($siret)) {
      //echo var_dump($entrepriseData);
      header("Location: ../router.php?page=fiche_entreprise&siret=" . $siret);
      exit();

  } else {
      // Afficher un message d'erreur en cas d'échec de la mise à jour
      echo "Une erreur s'est produite avec le model ...";
  }
} else {
  // Rediriger vers une page d'erreur si le formulaire n'a pas été soumis
  // header("Location: vue_erreur.php");
  echo "<BR>Erreur ... ";
  exit();
}

  ?>

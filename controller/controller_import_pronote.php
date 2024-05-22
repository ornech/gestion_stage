<?php
// Démarrer la session en premier
session_start();

// Vérifie si l'utilisateur est connecté
require_once '../config/auth.php';
require_once '../config/db_connection.php';
require_once '../model/Profil.php';


if (isset($_POST['submit'])) {
  // Vérifiez si le fichier a été téléchargé
  if (is_uploaded_file($_FILES['csv_file']['tmp_name'])) {
    // Ouvrir le fichier CSV
    $csvFile = fopen($_FILES['csv_file']['tmp_name'], 'r');

    // Sauter la première ligne (les en-têtes)
    fgetcsv($csvFile, 1000, ";");

    $log = "<table class='table'>";

    // Parcourir les lignes du fichier CSV
    while (($line = fgetcsv($csvFile, 1000, ";")) !== FALSE) {
      // Assurez-vous que le nombre de colonnes est correct

      if (count($line) >= 13) {
        $nom_complet = explode(' ', $line[0]);
        $nom = $nom_complet[0];
        $prenom = array_pop($nom_complet);
        $spe = ''; // Exemple de spécialité
        $date= explode('/', $line[4]);
        $promo = $date[2]; //
        $login = strtolower($prenom . '.' . $nom);
        $password = password_hash('achanger', PASSWORD_BCRYPT); // Mot de passe par défaut
        $statut = 'Etudiant';
        $inactif = 0;
        $password_reset = 1;

        //vérifie si l'étudiant est sorti des effectifs
        if (strlen($line[5]) > 1 ) {
          // Si ce champs est rempli alors l'étudiant est sorti des effectifs
          continue; // Passer à la prochaine ligne du CSV
        }

        // Vérifiez si le login existe déjà
        $checkSql = "SELECT COUNT(*) FROM User WHERE login = :login";
        $checkStmt = $conn->prepare($checkSql);
        $checkStmt->bindParam(':login', $login, PDO::PARAM_STR);
        $checkStmt->execute();
        $loginExists = $checkStmt->fetchColumn();

        if ($loginExists) {
          // Le login existe déjà, prendre une action appropriée
          continue; // Passer à la prochaine ligne du CSV
        }

      }
      // Création d'une instance de l'objet Entreprise
      $profil = new Profil($conn);

      // Appel de la méthode  de l'objet Profil
      if ($profil->import($nom, $prenom ,$spe, $promo, $login ,$password, $statut, $inactif, $password_reset)) {
        // Redirection vers la page de détails de l'entreprise après la mise à jour


      } else {
        $message= "Une erreur s'est produite.";
        header("Location: ../router.php?page=erreur&message=$message");
      }
    }
    // Fermez le fichier CSV
    fclose($csvFile);
    //echo "Importation terminée avec succès!";
    header("Location: ../router.php?page=gestion_etu");
  } else {
    $message= "Veuillez télécharger un fichier CSV valide.";
    header("Location: ../router.php?page=erreur&message=$message");

  }

} else {
  // Rediriger vers une page d'erreur si le formulaire n'a pas été soumis
  // header("Location: vue_erreur.php");
  echo "<BR>Erreur ... ";
  exit();
}
?>

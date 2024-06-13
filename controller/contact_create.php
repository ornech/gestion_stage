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

if(isset($_POST["submit"]) && !isset($_POST["isPopup"])){
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $fonction = $_POST["fonction"];

    $idEntreprise = $_POST["idEntreprise"];
    $Created_UserID = $_SESSION["userID"];
    $statut = $_SESSION["statut"];

    $contact = new Contact($conn);

    if($contact->create_contact($nom, $prenom, $email, $telephone, $fonction, $idEntreprise, $Created_UserID, $statut)){
        header("Location: ../router.php?page=fiche_entreprise&idEntreprise=" . $idEntreprise . "#contactSuccess");
        exit();
    } else {
        // Afficher un message d'erreur en cas d'échec de la mise à jour
        echo "Une erreur s'est produite.";
    }
}else if (isset($_POST["submit"]) && isset($_POST["isPopup"])){
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $fonction = $_POST["fonction"];

    $idEntreprise = $_POST["idEntreprise"];
    $Created_UserID = $_SESSION["userID"];
    $statut = $_SESSION["statut"];

    $contact = new Contact($conn);

    if($contact->create_contact($nom, $prenom, $email, $telephone, $fonction, $idEntreprise, $Created_UserID, $statut)){
      ?>
      <script src="/js/popup.js"></script>
      <script>
        sendResponse(
          {statut: "success", contents: {
            type: "contact", 
            id: <?= $conn->lastInsertId() ?>, 
            nom: "<?=$nom?>",
            prenom : "<?=$prenom?>",
        }});
      </script><?php
        exit();
    } else {
        // Afficher un message d'erreur en cas d'échec de la mise à jour
        echo "Une erreur s'est produite.";
    }
}

?>
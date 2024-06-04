<?PHP
// Controlleur
session_start();

// Vérifie si l'utilisateur est connecté
//echo __DIR__;
require_once '../config/auth.php';
require_once '../model/Entreprise.php';
require_once '../config/db_connection.php';


// Récupérer les valeurs sélectionnées (s'il y en a)
if(isset($_GET['siret']) && (isset($_GET['isPopup']) == false)) {
  $siret = isset($_GET['siret']) ? $_GET['siret'] : null;

  require_once '../controller/controller_log.php';

  // Créer une instance de la classe Recherche
  $entreprise = new Entreprise($conn);

  // Appeler la méthode recherche
  if ($entreprise->entreprise_create_siret($siret, false)) {

    $newValue = $entreprise->read_fiche_siret($siret);
    $newEntrepriseId = $newValue->EntrepriseID;

    addLog($conn, 3, $_SESSION['userID'], "entreprise", $newEntrepriseId, null, $newValue);
    
    header("Location: ../router.php?page=fiche_entreprise&idEntreprise=" . $newEntrepriseId);
    exit();

  } else {
      // Afficher un message d'erreur en cas d'échec de la mise à jour
      echo "Une erreur s'est produite avec le model: "  . $_SERVER['SCRIPT_NAME'];
  }
} if(isset($_GET['siret']) && (isset($_GET['isPopup']))){
  ?>
  <script src="/js/popup.js"></script>
  <?php

  require_once '../controller/controller_log.php';

  $siret = isset($_GET['siret']) ? $_GET['siret'] : null;

  // Créer une instance de la classe Recherche
  $entreprise = new Entreprise($conn);

  // Appeler la méthode recherche
  if ($entreprise->entreprise_create_siret($siret, true)) {
      
    $newValue = $entreprise->read_fiche_siret($siret);
    $newEntrepriseId = $newValue->EntrepriseID;

    addLog($conn, 3, $_SESSION['userID'], "entreprise", $newEntrepriseId, null, $newValue);

    ?><script>
    sendResponse(
      {statut: "success", contents: {
        type: "entreprise", 
        id: <?= $newEntrepriseId ?>, 
        nom: "<?=$entreprise->nomEntreprise?>"
      }});
    </script><?php
    
    exit();

  } else {
      ?><script>sendResponse({statut: "erreur"});</script><?php
  }

}else {
  ?><script>sendResponse({statut: "erreur"});</script><?php
  exit();
}

  ?>

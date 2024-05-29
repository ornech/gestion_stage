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

  // Créer une instance de la classe Recherche
  $entreprise = new Entreprise($conn);

  // Appeler la méthode recherche
  if ($entreprise->entreprise_create_siret($siret, false)) {
      //echo var_dump($entrepriseData);
      header("Location: ../router.php?page=fiche_entreprise&siret=" . $siret);
      exit();

  } else {
      // Afficher un message d'erreur en cas d'échec de la mise à jour
      echo "Une erreur s'est produite avec le model: "  . $_SERVER['SCRIPT_NAME'];
  }
} if(isset($_GET['siret']) && (isset($_GET['isPopup']))){
  ?>
  <script src="/js/popup.js"></script>
  <?php

  $siret = isset($_GET['siret']) ? $_GET['siret'] : null;

  // Créer une instance de la classe Recherche
  $entreprise = new Entreprise($conn);

  // Appeler la méthode recherche
  if ($entreprise->entreprise_create_siret($siret, true)) {
    if(!isset($entreprise->idEntreprise)){
      $entrepriseCreated = $entreprise->getLastEnterprise();
      ?><script>
      sendResponse(
        {statut: "success", contents: {
          type: "entreprise", 
          id: <?=$entrepriseCreated->id?>, 
          nom: "<?=$entreprise->nomEntreprise?>"
        }});
      </script><?php
    }else{
      ?><script>
      sendResponse(
        {statut: "success", contents: {
          type: "entreprise", 
          id: <?=$entreprise->idEntreprise?>, 
          nom: "<?=$entreprise->nomEntreprise?>"
        }});
      </script><?php
    }
    exit();

  } else {
      ?><script>sendResponse({statut: "erreur"});</script><?php
  }

}else {
  ?><script>sendResponse({statut: "erreur"});</script><?php
  exit();
}

  ?>

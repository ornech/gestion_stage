<?php
// Démarrer la session en premier
// A du être supprimer sur windows ?
// session_start();

// Vérifie si l'utilisateur est connecté
require_once 'config/auth.php';
require_once 'config/db_connection.php';

// Inclure les en-têtes HTML
include 'vues/headers.php';

// Affichez le contenu de la page en fonction du statut de l'utilisateur connecté
if (isset($_SESSION['statut']) && $_SESSION['statut'] === 'Professeur') {
  // Affichez le menu pour les professeurs
  include 'vues/navbar_prof.php';
  //echo "Bienvenue sur la page enseignant";
} else {
  // Affichez le menu par défaut
  include 'vues/navbar_etu.php';
  //echo "Bienvenue sur la page étudiant";
}

// Fonction de routage
function router($page, $conn) {
  switch ($page) {
    case 'accueil':
      include 'vues/accueil.php';
      break;

    case 'listerEntreprises':
      include 'model/Entreprise.php'; // Inclure le modèle Entreprise
      $entrepriseModel = new Entreprise($conn); // Instancier le modèle
      $entreprises = $entrepriseModel->read(); // Lire les entreprises
      include 'vues/vue_liste_entreprises.php'; // Inclure la vue pour afficher la liste des entreprises
      break;

    case 'fiche_entreprise':
      include_once 'model/Entreprise.php';
      // Instancier le modèle Entreprise
      $entrepriseModel = new Entreprise($conn);
      // Récupérer l'ID de l'entreprise depuis l'URL
      $idEntreprise = isset($_GET['idEntreprise']) ? $_GET['idEntreprise'] : null;
      // Charger les détails de l'entreprise en fonction de l'ID
      $ficheEntreprise = $entrepriseModel->read_fiche($idEntreprise);
      // Inclure la vue pour afficher les détails de l'entreprise
      include 'vues/vue_fiche_entreprises.php';
      break;

    case 'modifier_entreprise':
      include_once 'model/Entreprise.php';
      // Instancier le modèle Entreprise
      $entrepriseModel = new Entreprise($conn);
      // Récupérer l'ID de l'entreprise depuis l'URL
      $idEntreprise = isset($_GET['idEntreprise']) ? $_GET['idEntreprise'] : null;
      // Charger les détails de l'entreprise en fonction de l'ID
      $ficheEntreprise = $entrepriseModel->read_fiche($idEntreprise);
      // Inclure la vue pour modifier les détails de l'entreprise
      include 'vues/vue_modif_entreprise.php';
      break;

    case 'create_entreprise':
      $nomEntreprise = isset($_GET['nomEntreprise']) ? $_GET['nomEntreprise'] : null;
      include 'vues/vue_entreprise_create.php';
      break;

   case 'entreprise_importer':
      include_once 'model/Entreprise.php';
      //$entrepriseModel = new Entreprise($conn);
      //$importer = $entrepriseModel->importer();
      include 'vues/xxxxxxxx.php';

      break;

    case 'activite_prof':
      include_once 'model/activite.php';
      // Instancier le modèle Entreprise
      $ActiviteModel = new Activite($conn);
      $ActiviteEtudiant = $ActiviteModel->activite_prof();
      include 'vues/vue_activite_prof.php';
      break;

    case 'activite_etu':
      include_once 'model/activite.php';
      $ActiviteModel = new Activite($conn);
      $ActiviteEtudiant = $ActiviteModel->activite_etu();
      include 'vues/vue_activite_etu.php';
      break;

    case 'activite_create':
      include_once 'model/activite.php';
      $type = isset($_GET['type']) ? $_GET['type'] : null;
      $ID_Entreprise = isset($_GET['ID_Entreprise']) ? $_GET['ID_Entreprise'] : null;
      $type = isset($_GET['Commentaire']) ? $_GET['Commentaire'] : null;
      $IdEtudiant = isset($_GET['IdEtudiant']) ? $_GET['IdEtudiant'] : null;
      include 'vues/vue_activite_create.php';
      break;

    case 'profil':
      include_once 'model/Profil.php';
      $profilModel = new Profil($conn);
      $Profil = $profilModel->read_my_profil();
      include 'vues/vue_profil_user.php';
      break;

    case 'view_profil':
        include_once 'model/Profil.php';
        $idProfil = isset($_GET['id']) ? $_GET['id'] : null;
        $profilModel = new Profil($conn);
        $Profil = $profilModel->read_profil($idProfil);
        include 'vues/vue_profil_user.php';
        break;

    case 'create_user':
      //include_once 'model/Profil.php';
      //$profilModel = new Profil($conn);
      //$create_user = $profilModel->create_user();
      include 'vues/vue_profil_create_user.php';
      break;

    case 'gestion_etu':
      include_once 'model/Profil.php';
      $profilModel = new Profil($conn);
      $profils = $profilModel->list_profil();
      include 'vues/vue_profil_gestion.php';
      break;

    case 'reset_password':
      include_once 'model/Profil.php';
      $idProfil = isset($_GET['idProfil']) ? $_GET['idProfil'] : null;
      $profilModel = new Profil($conn);
      $reset = $profilModel->reset_password($idProfil);
      break;

    case 'profil_disable':
      include_once 'model/Profil.php';
      $idProfil = isset($_GET['idProfil']) ? $_GET['idProfil'] : null;
      $profilModel = new Profil($conn);
      $profil_disable = $profilModel->profil_disable($idProfil);
      break;

    case 'profil_enable':
      include_once 'model/Profil.php';
      $idProfil = isset($_GET['idProfil']) ? $_GET['idProfil'] : null;
      $profilModel = new Profil($conn);
      $profil_enable = $profilModel->profil_enable($idProfil);
      break;

    case 'recherche':
      include_once 'model/recherche.php';
      $naf = isset($_POST['naf']) ? $_POST['naf'] : null;
      $cp = isset($_POST['cp']) ? $_POST['cp'] : null;
      $recherche = new Recherche();
      $resultat = $recherche->recherche($naf, $cp);
      include 'vues/vue_recherche.php';
      break;

    case 'recherche_details':
      include_once 'model/recherche.php';
      $siret = isset($_GET['siret']) ? $_GET['siret'] : null;
      $recherche = new Recherche();
      $resultats = $recherche->detail($siret);
      include 'vues/vue_recherche_details.php';
      break;

    case 'Contact_fiche':
      include_once 'model/Contact.php';
      // Instancie le modèle
      $contactModel = new Contact($conn);
      // Récupérer l'ID du contact depuis l'URL
      $idContact = isset($_GET['idContact']) ? $_GET['idContact'] : null;
      // Charge les données
      $ContactFiche = $contactModel->read_fiche($idContact);
      // Inclure la vue
      include 'vues/vue_contact_fiche.php';
      break;

   case 'erreur':
     $message = isset($_GET['messge']) ? $_GET['message'] : null;
     include 'vues/vue_erreur.php'; // Page d'accueil par défaut
     break;

    default:
      include 'vues/vue_erreur.php'; // Page d'accueil par défaut
      break;
    }
  }

  // Récupérer la page demandée depuis l'URL ou d'autres paramètres de requête
  $page = isset($_GET['page']) ? $_GET['page'] : 'accueil';

  // Appeler la fonction de routage pour afficher la vue appropriée

  router($page, $conn); // Passer $conn en paramètre
  include 'vues/footer.php';
  ?>

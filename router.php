<?php
ob_start();
// Démarrer la session en premier
// A du être supprimer sur windows ?
// session_start();

// Vérifie si l'utilisateur est connecté
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

require_once 'config/auth.php';
require_once 'config/db_connection.php';

// Récupérer la page demandée depuis l'URL ou d'autres paramètres de requête
$page = isset($_GET['page']) ? $_GET['page'] : 'accueil';

// Inclure les en-têtes HTML
include 'vues/headers.php';

// Affichez le contenu de la page en fonction du statut de l'utilisateur connecté
if(!str_starts_with($page, "vue_popup")){
  if (isset($_SESSION['statut']) && $_SESSION['statut'] === 'Professeur') {
    // Affichez le menu pour les professeurs
    include 'vues/navbar_prof.php';
    //echo "Bienvenue sur la page enseignant";
  } else {
    // Affichez le menu par défaut
    include 'vues/navbar_etu.php';
    //echo "Bienvenue sur la page étudiant";
  }
}


// Fonction de routage
function router($page, $conn) {
  switch ($page) {
    case 'accueil':
      include_once 'model/Stage.php'; // Inclure le modèle Stage
      include_once 'model/Entreprise.php'; // Inclure le modèle Entreprise
      include_once 'model/Contact.php'; // Inclure le modèle Contact

      $stageModel = new Stage($conn); // Instancier le modèle
      $stages = $stageModel->list();

      $entrepriseModel = new Entreprise($conn); // Instancier le modèle
      $entreprises = $entrepriseModel->read();

      $contactModel = new Contact($conn); // Instancier le modèle
      $contacts = $contactModel->list();
      include 'vues/accueil.php';
      break;

    case 'listerEntreprises':
      include 'model/Entreprise.php'; // Inclure le modèle Entreprise
      include 'model/Contact.php'; // Inclure le modèle Contact
      $entrepriseModel = new Entreprise($conn); // Instancier le modèle
      $entreprises = $entrepriseModel->read(); // Lire les entreprises
      include 'vues/vue_liste_entreprises.php'; // Inclure la vue pour afficher la liste des entreprises
      break;

    case 'fiche_entreprise':
      include_once 'model/Entreprise.php';
      include_once 'model/Contact.php';

      include_once 'model/Stage.php';
      $stageModel = new Stage($conn);

      // Instancier le modèle Entreprise  __


      $entrepriseModel = new Entreprise($conn);
      $contacteModel = new Contact($conn); // Instancier le modèle
      // Récupérer l'ID de l'entreprise depuis l'URL
      if (isset($_GET['idEntreprise'])) {
        $idEntreprise = isset($_GET['idEntreprise']) ? $_GET['idEntreprise'] : null;
        // Charger les détails de l'entreprise en fonction de l'ID
        $ficheEntreprise = $entrepriseModel->read_fiche($idEntreprise);
        $contacts = $contacteModel->read_list($idEntreprise); // Lire les entreprises
        $stages = $stageModel->list_by_entreprise($idEntreprise);
      }
      if (isset($_GET['siret'])) {
        $siret = isset($_GET['siret']) ? $_GET['siret'] : null;
        // Charger les détails de l'entreprise en fonction du siret
        $ficheEntreprise = $entrepriseModel->read_fiche_siret($siret);
        $contacts = $contacteModel->read_list_siret($siret); // Lire les entreprises
        }
      // Inclure la vue pour afficher les détails de l'entreprise
      include 'vues/vue_fiche_entreprises.php';
      // include 'vues/vue_contact_list.php';
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

    case 'import_entreprise':
      include 'vues/vue_entreprise_import.php';
      break;

    case 'ajouter_entreprise':
      include 'vues/vue_entreprise_ajouter.php';
      break;

    case 'activite_prof':
      route_protect('Professeur');

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
      include_once 'model/Stage.php';

      $idProfil = isset($_GET['id']) ? $_GET['id'] : null;
      $profilModel = new Profil($conn);
      $stageModel = new Stage($conn);
      $Profil = $profilModel->read_profil($idProfil);
      $stages = $stageModel->readFromEtudiantId($idProfil);

      include 'vues/vue_profil_user.php';
      break;

    case 'create_user':
      route_protect('Professeur');
      include 'vues/vue_profil_create_user.php';
      break;

    case 'edit_profil':
      route_protect('Professeur');
      include_once 'model/Profil.php';
      $idProfil = isset($_GET['id']) ? $_GET['id'] : null;
      $profilModel = new Profil($conn);

      if($idProfil == null){
        header("Location: router.php?page=erreur&title=Erreur&message=Une erreur est survenue lors de l'accès à la page.");
      }
      
      $Profil = $profilModel->read_profil($idProfil);
      include 'vues/vue_profil_edit.php';
      break;

    case 'edit_my_profil':
      include_once 'model/Profil.php';
      $profilModel = new Profil($conn);
      $Profil = $profilModel->read_my_profil();
      include 'vues/vue_profil_edit.php';
      break;

    case 'gestion_etu':
      route_protect('Professeur');
      include_once 'model/Profil.php';
      $profilModel = new Profil($conn);
      $profils = $profilModel->list_profil();
      include 'vues/vue_profil_gestion.php';
      break;

    case 'reset_password':
      route_protect('Professeur');
      include_once 'model/Profil.php';
      $idProfil = isset($_GET['idProfil']) ? $_GET['idProfil'] : null;
      $profilModel = new Profil($conn);
      $reset = $profilModel->reset_password($idProfil);
      break;

    case 'profil_disable':
      route_protect('Professeur');
      include_once 'model/Profil.php';
      $idProfil = isset($_GET['idProfil']) ? $_GET['idProfil'] : null;
      $profilModel = new Profil($conn);
      $profil_disable = $profilModel->profil_disable($idProfil);
      break;

    case 'profil_enable':
      route_protect('Professeur');
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

    case 'contact_create':
      include_once 'model/Contact.php';

      // Instancie le modèle
      $contactModel = new Contact($conn);
      $idEntreprise = isset($_GET['idEntreprise']) ? $_GET['idEntreprise'] : null;

      if($idEntreprise == null){
         header("Location: router.php?page=erreur&title=Erreur de création&message=Erreur lors de l'accès au formulaire de création du contact, veuillez réessayer.");
      }

      include 'vues/vue_contact_create.php';
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

    case 'contact_update':
      include_once 'model/Contact.php';
      // Instancie le modèle
      $contactModel = new Contact($conn);
      // Récupérer l'ID du contact depuis l'URL
      $idContact = isset($_GET['idContact']) ? $_GET['idContact'] : null;
      // Charge les données
      $ContactFiche = $contactModel->read_fiche($idContact);
      // Inclure la vue
      include 'vues/vue_contact_fiche_edit.php';
      break;

    case 'stage_consignes':
      include 'vues/vue_stage_consignes.php';
      break;

    case 'stage_read':
      include_once 'model/Stage.php';
      include_once 'model/Profil.php';

      $idStage = isset($_GET['id']) ? $_GET['id'] : null;
      $idEtudiant = isset($_GET['idEtudiant']) ? $_GET['idEtudiant'] : null;

      $stageModel = new Stage($conn);
      $profilModel = new Profil($conn);

      $Profil = $profilModel->list_by_professeur($idEtudiant);
      $stage = $stageModel->stage_by_id($idStage);

      include 'vues/vue_stage_user.php';
      break;

    case 'stage_edit':
      include_once 'model/Stage.php';
      include_once 'model/Contact.php';
      $idStage = isset($_GET['idStage']) ? $_GET['idStage'] : null;

      if($idStage == null){
        exit(header("Location: router.php?page=erreur&title=Erreur d'accès&message=Erreur lors de l'accès au formulaire de d'édition du stage, veuillez réessayer."));
      }

      $stageModel = new Stage($conn);
      $Stage = isset($stageModel->stage_by_id($idStage)[0]) ? $stageModel->stage_by_id($idStage) : null;

      if($Stage == null){
        exit(header("Location: router.php?page=erreur&title=Erreur d'accès&message=Impossible de trouver le stage demandé, veuillez réessayer."));
      }

      $contacteModel = new Contact($conn);
      $contacts = $contacteModel->list();

      $Stage = $Stage[0];

      include 'vues/vue_stage_edit.php';
      break;

    case 'stage_list':
      route_protect('Professeur');
      include_once 'model/Stage.php';
      $stageModel = new Stage($conn);
      $stages = $stageModel->list();
      include 'vues/vue_stage_list.php';
      break;

    case 'stage_sio1':
      route_protect('Professeur');
      include_once 'model/Stage.php';
      include_once 'model/Profil.php';

      $classe = "SIO1";

      $profilModel = new Profil($conn);
      $profils = $profilModel->list_by_classe($classe);

      $stageModel = new Stage($conn);

      include 'vues/vue_stage_list.php';
      break;

    case 'stage_sio2':
      include_once 'model/Stage.php';
      include_once 'model/Profil.php';

      $classe = "SIO2";

      $profilModel = new Profil($conn);
      $profils = $profilModel->list_by_classe($classe);

      $stageModel = new Stage($conn);

      include 'vues/vue_stage_list.php';
      break;

    case 'stage_ancien':
      include_once 'model/Stage.php';
      $stageModel = new Stage($conn);
      $stages = $stageModel->list_by_classe("Ancien étudiant");
      include 'vues/vue_stage_list.php';
      break;

    case 'stage_create':
      include_once 'model/Stage.php';
      include_once 'model/Contact.php';

      $idEntreprise = isset($_GET['idEntreprise']) ? $_GET['idEntreprise'] : null;
      $idUser = $_SESSION['userID'];

      if($idEntreprise == null){
        header("Location: router.php?page=erreur&title=Erreur d'accès&message=Erreur lors de l'accès au formulaire de création de stage, veuillez réessayer.");
      }

      $contacteModel = new Contact($conn);
      $contacts = $contacteModel->read_list($idEntreprise);

      include 'vues/vue_stage_create.php';
      break;

    case 'prof_stage_create':
      route_protect('Professeur');
      include_once 'model/Profil.php';
      include_once 'model/Stage.php';
      include_once 'model/Contact.php';

      $profilModel = new Profil($conn);
      $profils = $profilModel->list_profil();

      $stageModel = new Stage($conn);
      $stages = $stageModel->list();

      $contacteModel = new Contact($conn);
      $contacts = $contacteModel->list();

      include 'vues/vue_prof_create_stage.php';
      break;

    case 'stage_suivi_prof':
      route_protect('Professeur');
      include 'vues/vue_stage_suivi_create.php';
      break;

    case 'vue_popup_select_etu':
      include_once 'model/Profil.php';

      $profilModel = new Profil($conn);
      $profils = $profilModel->list_classes();

      include 'vues/popups/vue_popup_select.php';
      break;

    case 'vue_popup_select_entreprise':
      include_once 'model/Entreprise.php';

      $entrepriseModel = new Entreprise($conn);
      $entreprises = $entrepriseModel->read();

      include 'vues/popups/vue_popup_select.php';
      break;

    case 'vue_popup_select_maitredestage':
      include_once 'model/Contact.php';

      $contacteModel = new Contact($conn);
      $contacts = $contacteModel->read_list($_GET["idEntreprise"]);

      include 'vues/popups/vue_popup_select.php';
      break;

    case 'vue_popup_create_entreprise':
      $isPopup = true;
      include 'vues/vue_entreprise_import.php';
      break;

    case 'vue_popup_create_maitredestage':
      include_once 'model/Contact.php';
      $isPopup = true;

      // Instancie le modèle
      $contactModel = new Contact($conn);
      $idEntreprise = isset($_GET['idEntreprise']) ? $_GET['idEntreprise'] : null;

      if($idEntreprise == null){
         header("Location: router.php?page=erreur&title=Erreur de création&message=Erreur lors de l'accès au formulaire de création du contact, veuillez réessayer.");
      }

      include 'vues/vue_contact_create.php';
      break;

    case 'import_pronote':
      route_protect('Professeur');
      include_once 'model/Profil.php';
      $import_pronoteModel = new Profil($conn);
      include 'vues/vue_import_pronote.php';
      break;


    case 'stage_convention':
      include 'vues/vue_stage_convention.php';
      break;

    case 'logs':
      route_protect('Professeur');

      include_once 'model/Log.php';

      $logModel = new Log($conn);
      $logs = $logModel->list();
  
      include 'vues/vue_logs.php';
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

  // Appeler la fonction de routage pour afficher la vue appropriée
  

  router($page, $conn); // Passer $conn en paramètre
  if(!str_starts_with($page, "vue_popup")){
    include 'vues/footer.php';
  }

ob_end_flush();
?>

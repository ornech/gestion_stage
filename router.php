<?php
// Inclure le fichier de connexion à la base de données
require_once 'config/db_connection.php';
include 'vues/headers.php';

// Démarrer la session
session_start();

// Limitez la durée de validité de la session
$session_duration = 86400; // Durée de validité de la session en secondes (ici, 1 jour)
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $session_duration) {
    // Déconnectez l'utilisateur si la session a expiré
    session_unset();
    session_destroy();
    // Redirigez l'utilisateur vers la page de connexion
    header("Location: login.php");
    exit();
}

// Mettez à jour le timestamp de dernière activité
$_SESSION['last_activity'] = time();


// Affichez le contenu de la page en fonction du statut de l'utilisateur connecté
if (isset($_SESSION['statut']) && $_SESSION['statut'] === 'Professeur') {
    // Affichez le menu pour les professeur
    include 'vues/navbar_prof.php';
    echo "Bienvenue sur la page enseignant";


} else {
    // Affichez le menu par défaut
    include 'vues/navbar_etu.php';
    echo "Bienvenue sur la page étudiant";


}






// Fonction de routage basique
function router($page, $conn) {
    switch ($page) {
        case 'accueil':
            include 'vues/accueil.php';
            break;
        case 'profil':
            include 'vues/profil.php';
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

        case 'activite_prof':
           include_once 'model/activite.php';
           // Instancier le modèle Entreprise
           $ActiviteModel = new Activite($conn);
           $ActiviteEtudiant = $ActiviteModel->activite_prof();
            include 'vues/vue_activite_prof.php';
            break;

        case 'activite_create':
          include_once 'model/activite.php';

          include 'vues/vue_activite_create.php';
          break;
        // Ajoutez d'autres cas pour chaque page de votre application
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

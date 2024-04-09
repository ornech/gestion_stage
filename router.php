<?php
// Inclure le fichier de connexion à la base de données
require_once 'config/db_connection.php';

// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    // Rediriger vers la page de connexion
    header("Location: login.php");
    exit;
}

include 'vues/headers.php';
include 'vues/navbar.php';


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

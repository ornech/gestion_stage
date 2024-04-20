<?php
// Fichier /controller/activite_controller.php

require_once '../model/activite.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")  {
    // Récupération des données du formulaire
    $ID_Entreprise = $_POST['ID_Entreprise'];
    $type = $_POST['type'];
    $Commentaire = $_POST['Commentaire'];
    $IdEtudiant = $_POST['IdEtudiant'];

    // Inclure le fichier de configuration pour la connexion SQL
    require_once '../config/db_connection.php';

    // Instancier le modèle Activite
    $activiteModel = new Activite($conn);

    // Appeler la méthode createActivite pour enregistrer l'activité
    if ($activiteModel->createActivite($ID_Entreprise, $type, $Commentaire, $IdEtudiant)) {
        echo "<p>Activité créée avec succès !</p>";
        header("Location: ../router.php?page=activite_etu");
    } else {
        echo "<p>Une erreur est survenue lors de la création de l'activité.</p>";
        // header("Location: index.php");
    }
}
?>

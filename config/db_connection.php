<?php

$host = "localhost";
$db_name = "gestion_stage";
$username = "admin";
$password = "admin";

try {
    // Création de la connexion PDO
    $conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);

    // Définition de l'attribut d'erreur PDO pour lever les exceptions en cas d'erreur
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Exécution des requêtes SQL et traitement des données...

} catch(PDOException $e) {
    // En cas d'erreur lors de la connexion, afficher le message d'erreur
    echo "La connexion à la base de données a échoué : " . $e->getMessage();
}
?>

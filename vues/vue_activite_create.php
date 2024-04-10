<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Inclure le fichier de configuration pour la connexion SQL en utilisant un chemin relatif
// require_once 'config/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")  {
    // Récupération des données du formulaire
    $ID_Entreprise = $_POST['ID_Entreprise'];
    $type = $_POST['type'];
    $Commentaire = $_POST['Commentaire'];
    $IdEtudiant = $_POST['IdEtudiant'];

    // Traitement des données (par exemple, enregistrement dans la base de données)
    $query = "INSERT INTO Activite_Etu (ID_Entreprise, date, type, Commentaire, IdEtudiant)
              VALUES (:ID_Entreprise, NOW(), :type, :Commentaire, :IdEtudiant)";

    // Exécution de la requête préparée
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':ID_Entreprise', $ID_Entreprise);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':Commentaire', $Commentaire);
    $stmt->bindParam(':IdEtudiant', $IdEtudiant);

    if ($stmt->execute()) {
        echo "<p>Activité créée avec succès !</p>";
    } else {
        echo "<p>Une erreur est survenue lors de la création de l'activité.</p>";
    }
}
?>

<h1>Créer une activité</h1>
<form action="" method="post">
    <label for="ID_Entreprise">ID de l'entreprise:</label>
    <input type="text" name="ID_Entreprise" id="ID_Entreprise" required><br><br>

    <label for="type">Type d'activité:</label>
    <input type="text" name="type" id="type" required><br><br>

    <label for="Commentaire">Commentaire:</label><br>
    <textarea name="Commentaire" id="Commentaire" rows="4" cols="50"></textarea><br><br>

    <label for="IdEtudiant">ID de l'étudiant:</label>
    <input type="text" name="IdEtudiant" id="IdEtudiant" required><br><br>

    <input type="submit" name="submit" value="Créer l'activité">
</form>

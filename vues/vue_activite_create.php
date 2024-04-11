<?php
require_once '../config/auth.php';
?>
<h1>Créer une activité</h1>
<form action="controller/activite_controller.php" method="post">
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

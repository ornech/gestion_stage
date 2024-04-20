<?php
require_once 'config/auth.php';
require_once('config/db_connection.php');
?>

<h1>Créer une activité</h1>

<div class="alert alert-danger" role="alert">
  Vous être sur le point de valider
   <?php
   if ($_GET['type'] == "tel") {
       echo "un appel téléphonique.";
   }
   if ($_GET['type'] == "email") {
       echo "l'envoi d'un email.";
   }


    ?>
</div>

<form action="controller/activite_controller.php" method="post">
    <label for="ID_Entreprise">ID de l'entreprise:</label>
    <input type="text" name="ID_Entreprise" id="ID_Entreprise" required><br>

    <input type="hidden" name="type" value="<?php echo $_GET['type']?>"><br><br>

    <label for="Commentaire">Commentaire:</label><br>
    <textarea name="Commentaire" id="Commentaire" rows="4" cols="50"></textarea><br>

    <input type="hidden" name="IdEtudiant" value="<?php echo $_SESSION['userID']?>">

    <input type="submit" name="submit" value="Valider">
</form>

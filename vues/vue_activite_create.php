<?php
require_once 'config/auth.php';
require_once 'config/db_connection.php';

try {
  // Préparer la requête SQL pour sélectionner les deux colonnes spécifiques de la table
  $query = "SELECT id, nomEntreprise, ville  FROM Entreprise ORDER BY nomEntreprise ASC";

  // Exécuter la requête SQL
  $stmt = $conn->query($query);

  // Récupérer les résultats de la requête dans un tableau associatif
  $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
  // En cas d'erreur, afficher le message d'erreur
  echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
}

?>



<h1>Créer une activité</h1>

<div class="alert alert-danger" role="alert">
  Vous êtes sur le point de valider
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
  <select name="ID_Entreprise">
    <?php foreach ($resultats as $row) : ?>
      <option value="<?php echo $row['id']; ?>"><?php echo $row['nomEntreprise'] . " (" . $row['ville'] . ")"; ?></option>
    <?php endforeach; ?>
  </select> Si l'entreprise n'est pas présente <a hrel"#" class="btn btn-primary" role="button"> Ajoutez votre entreprise</a><br>


  <input type="hidden" name="type" value="<?php echo $_GET['type']; ?>"><br><br>
  <?php if ($_GET['type']== "email"){ ?>
  <label for="contact_mail">Adresse email du contact</label><br>
  <input type="email" name="contact_mail" id="contact_mail" required><br>
  <?PHP } ?>
  <?php if ($_GET['type']=="tel"){ ?>
  <label for="contact_mail">Tel du contact</label><br>
  <input type="email" name="contact_tel" id="contact_mail" required><br>
  <?PHP } ?>

  <label for="contact_nom">Tel du contact</label><br>
  <input type="input" id="contact_nom" name="contact_nom">


  <textarea name="Commentaire" id="Commentaire" rows="4" cols="50"></textarea><br>

  <input type="hidden" name="IdEtudiant" value="<?php echo $_SESSION['userID']; ?>">

  <input type="submit" name="submit" value="Valider">
</form>

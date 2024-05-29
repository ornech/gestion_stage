<?php
require_once 'config/auth.php';
require_once 'config/db_connection.php';

try {
  // Préparer la requête SQL pour sélectionner les deux colonnes spécifiques de la table
  $query = "SELECT * FROM vue_stage WHERE idProfesseur IS NULL";

  // Exécuter la requête SQL
  $stmt = $conn->query($query);

  // Récupérer les résultats de la requête dans un tableau associatif
  $stages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
  // En cas d'erreur, afficher le message d'erreur
  echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
}

try {
  // Préparer la requête SQL pour sélectionner les deux colonnes spécifiques de la table
  $query = "SELECT * FROM user WHERE statut='Professeur'";

  // Exécuter la requête SQL
  $stmt = $conn->query($query);

  // Récupérer les résultats de la requête dans un tableau associatif
  $professeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
  // En cas d'erreur, afficher le message d'erreur
  echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
}

?>

<h1>Suivi de stage</h1>
<form action="controller/stage_suivi_assignation.php" method="post">
  <label for="ID_Entreprise">Etudiant</label>
  <div class="select">
  <select name="Stage">
    <?php foreach ($stages as $stage) : ?>
      <option value="<?php echo $stage['idStage']; ?>"><?php echo $stage['classe'] . " - " . $stage['EtudiantNom'] . ""; ?></option>
    <?php endforeach; ?>
  </select>
</div>
<div class="select">
  <select name="Professeur">
    <?php foreach ($professeurs as $professeur) : ?>
      <option value="<?php echo $professeur['id']; ?>"><?php echo $professeur['nom'] . " " . $professeur['prenom'] . ""; ?></option>
    <?php endforeach; ?>
  </select>
</div>


  <input type="submit" name="submit" value="Valider">
</form>

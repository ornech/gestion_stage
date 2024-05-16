<?php
require_once 'config/auth.php';
?>
<H2> Le profil de ??? (TEST VUE) </H2>
<?php
    // Vérifier si les détails du profil sont disponibles
    if($Profil) {
        // Afficher les détails du profil
?>
        <p><strong>Nom:</strong> <?= $Profil->nom ?></p>
        <p><strong>Prénom:</strong> <?= $Profil->prenom ?></p>
        <p><strong>Mail:</strong> <?= $Profil->email ?></p>
        <p><strong>Statut:</strong> <?= $Profil->statut ?></p>
        <p><strong>Promotion:</strong> <?= $Profil->promo ?></p>
<?php
  } else {
  // Si aucune entreprise n'a été trouvée, afficher un message d'erreur
  echo "<p>Aucun profil trouvé avec cet identifiant.</p>";
  }
?>

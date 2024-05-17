<?php
require_once 'config/auth.php';
?>
<H1> FICHE ENTREPRISE</H1>
<?php
    // Vérifier si les détails de l'entreprise sont disponibles
    if($ficheEntreprise) {
        // Afficher les détails de l'entreprise
?>
        <h1>Détails de l'entreprise</h1>
        <p><strong>Nom de l'entreprise:</strong> <?= $ficheEntreprise->nomEntreprise ?></p>
        <p><strong>Adresse:</strong> <?= $ficheEntreprise->adresse ?></p>
        <p><strong>Ville:</strong> <?= $ficheEntreprise->ville ?></p>
        <p><strong>Téléphone:</strong> <?= $ficheEntreprise->tel ?></p>
        <p><strong>Code Postal:</strong> <?= $ficheEntreprise->codePostal ?></p>
<?php
    } else {
        // Si aucune entreprise n'a été trouvée, afficher un message d'erreur
        echo "<p>Aucune entreprise trouvée avec cet identifiant.</p>";
    }
?>

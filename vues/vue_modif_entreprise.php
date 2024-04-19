<?php
// fichier vues/vue_modif_entreprise.php
require_once 'config/auth.php';
// require_once __DIR__ . '/../config/auth.php';
?>

<h1>Modifier les détails de l'entreprise</h1>

<?php if ($ficheEntreprise): ?>
    <form action="vues/modifier_entreprise.php" method="POST">
        <input type="hidden" name="idEntreprise" value="<?php echo $ficheEntreprise->id; ?>">
        <label for="nom">Nom de l'entreprise:</label>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($ficheEntreprise->nomEntreprise); ?>"><br>

        <label for="adresse">Adresse:</label>
        <input type="text" id="adresse" name="adresse" value="<?php echo htmlspecialchars($ficheEntreprise->adresse); ?>"><br>

        <label for="ville">Ville:</label>
        <input type="text" id="ville" name="ville" value="<?php echo htmlspecialchars($ficheEntreprise->ville); ?>"><br>

        <label for="tel">Téléphone:</label>
        <input type="text" id="tel" name="tel" value="<?php echo htmlspecialchars($ficheEntreprise->tel); ?>"><br>

        <label for="codePostal">Code postal:</label>
        <input type="text" id="codePostal" name="codePostal" value="<?php echo htmlspecialchars($ficheEntreprise->codePostal); ?>"><br>

      <!--  <label for="indice_fiabilite">Indice de fiabilité:</label>
        <input type="text" id="indice_fiabilite" name="indice_fiabilite" value="<?php echo htmlspecialchars($ficheEntreprise->indice_fiabilite); ?>"><br>
        -->
        
        <label for="notes">Notes:</label>
        <textarea id="notes" name="notes"><?php echo htmlspecialchars($ficheEntreprise->Notes); ?></textarea><br>

        <label for="dep_geo">Département géographique:</label>
        <input type="text" id="dep_geo" name="dep_geo" value="<?php echo htmlspecialchars($ficheEntreprise->dep_geo); ?>"><br>

        <label for="code_ape">Code APE:</label>
        <input type="text" id="code_ape" name="code_ape" value="<?php echo htmlspecialchars($ficheEntreprise->code_ape); ?>"><br>

        <label for="adresse2">Adresse 2:</label>
        <input type="text" id="adresse2" name="adresse2" value="<?php echo htmlspecialchars($ficheEntreprise->adresse2); ?>"><br>

        <input type="submit" value="Enregistrer les modifications">
    </form>
<?php else: ?>
    <p>L'entreprise demandée n'existe pas.</p>
<?php endif; ?>

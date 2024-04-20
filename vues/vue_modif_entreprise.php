<?php
// fichier vues/vue_modif_entreprise.php
require_once 'config/auth.php';
// require_once __DIR__ . '/../config/auth.php';
?>

<h1>Modifier les détails de l'entreprise</h1>



<?php if ($ficheEntreprise): ?>

<form action="vues/modifier_entreprise.php" method="POST">

<div class="container">
  <div class="row">
    <div class="col">
      <input type="hidden" name="idEntreprise" value="<?php echo $ficheEntreprise->id; ?>">
      <label for="nom" class="form-label">Nom de l'entreprise</label>
      <input type="text" class="form-control" id="nom" name="nom" required value="<?php echo htmlspecialchars($ficheEntreprise->nomEntreprise); ?>">
      <label for="tel" class="form-label">Téléphone</label>
      <input type="text" class="form-control" id="tel" name="tel" value="<?php echo htmlspecialchars($ficheEntreprise->tel); ?>"><br>
      <label for="code_ape" class="form-label">Code APE</label>
      <input type="text" class="form-control" id="code_ape" name="code_ape" value="<?php echo htmlspecialchars($ficheEntreprise->code_ape); ?>"><br>

    </div>
    <div class="col">
      <label for="adresse" class="form-label">Adresse</label>
      <input type="text" class="form-control" id="adresse" name="adresse" required value="<?php echo htmlspecialchars($ficheEntreprise->adresse); ?>">
      <label for="adresse2" class="form-label">Adresse 2</label>
      <input type="text" class="form-control" id="adresse2" name="adresse2" value="<?php echo htmlspecialchars($ficheEntreprise->adresse2); ?>"> <BR>
      <div class="row">
        <div class="col">
          <label for="ville" class="form-label">Ville</label>
          <input type="text" class="form-control" id="ville" name="ville" required value="<?php echo htmlspecialchars($ficheEntreprise->ville); ?>">
        </div>
        <div class="col">
          <label for="codePostal" class="form-label">Code postal</label>
          <input type="text" class="form-control" id="codePostal" maxlength="5" required name="codePostal" value="<?php echo htmlspecialchars($ficheEntreprise->codePostal); ?>">
        </div>
      </div>



    </div>
  </div>
  <div class="row">
    <div class="col">
      <label for="notes" class="form-label" >Notes</label>
      <textarea id="notes" class="form-control" name="notes"><?php echo htmlspecialchars($ficheEntreprise->Notes); ?></textarea><br>
    </div>
  </div>
</div>
<div class="row">
  <div class="col">
    <input type="submit" class="btn btn-primary" value="Enregistrer les modifications">
  </div>
</div>
      <!--  <label for="indice_fiabilite">Indice de fiabilité:</label>
        <input type="text" id="indice_fiabilite" name="indice_fiabilite" value="<?php echo htmlspecialchars($ficheEntreprise->indice_fiabilite); ?>"><br>
        -->

    </form>
<?php else: ?>
    <p>L'entreprise demandée n'existe pas.</p>
<?php endif; ?>

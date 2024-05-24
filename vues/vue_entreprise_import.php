<?php
// fichier vues/vue_modif_entreprise.php
require_once 'config/auth.php';
// require_once __DIR__ . '/../config/auth.php';
?>
<SCRIPT>
function getValue() {
  // Sélectionner l'élément input et récupérer sa valeur
  var input = document.getElementById("siret").value;
  var url = ("https://annuaire-entreprises.data.gouv.fr/etablissement/" + input);
  // Afficher la valeur . input;
  window.location.href=url;
}
</SCRIPT>

<p class="title is-2">Importer entreprise</p>
<p class="subtitle is-4">Depuis la base de données SIRENE</p>
<p>Importez les données relatives à une entreprise à partir de son numéro de SIRET.</p>

<form action="../controller/entreprise_create_siret.php" method="GET" class="form-group mb-3">
  <input type="hidden" name="Created_UserID" value="<?= $_SESSION["userID"];?>">
  <div class="input-group mb-3">  <span class="input-group-text">Renseignez le N° de SIRET</span>
    <input type="text" class="form-control" name="siret" required minlength="14" maxlength="14" size="14" >
    <button class="btn btn-outline-secondary" onclick="getValue();" type="button">Vérifier le N° de SIRET</button>
    <button class="btn btn-outline-primary" type="submit">Valider</button>

  </div>

</form>

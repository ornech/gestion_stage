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

<div class="notification">
  <button class="delete"></button>
  Vous pouvez récupérer les N° de SIRET :

  <p>&nbsp; - &nbsp;Depuis la page <a href="../router.php?page=recherche"><i class="fa fa-search"></i> &nbsp; Recherche</a></p>
  <p>&nbsp; - &nbsp;Sur le site <a href="https://annuaire-entreprises.data.gouv.fr/" target="_blank">https://annuaire-entreprises.data.gouv.fr/</a></p>
</div>

<p>Importez les données relatives à une entreprise à partir de son numéro de SIRET.</p>
<form action="../controller/entreprise_create_siret.php" method="GET" class="form-group mb-3">
  <input type="hidden" name="Created_UserID" value="<?= $_SESSION["userID"];?>">
  <div class="field">
    <div class="control">
      <input  class="input is-normal" name="siret"  placeholder="Renseignez le N° de SIRET (14 caractères)" required minlength="14" maxlength="14" size="14" >
    </div>
  </div>

  <div class="field">
    <div class="control">
      <button class="button is-link is-light" onclick="getValue();" type="button">Vérifier le N° de SIRET</button>
      <button class="button is-link" type="submit">Valider</button>
    </div>
  </div>
</form>

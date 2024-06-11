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

<p class="title is-2">Ajouter entreprise</p>
<p class="subtitle is-4">Renseignez les champs manuellement</p>

<div class="notification is-danger is-light">
  <p><i class="fa fa-warning"></i> &nbsp; Il est recommandé d'utiliser l'<a href="../router.php?page=import_entreprise">ajout par un numéro de siret</a>,
  afin d'importer automatiquement les données relative à une entreprise.</p>
  <p>En utilsant ce formulaire, vous prenez le risque d'insérer des informations éronnées et rendre l'exploitation des données moins pertinante.</p>
</div>

<form action="../controller/creer_entreprise.php" method="POST">
  <input type="hidden" name="Created_UserID" value="<?= $_SESSION["userID"];?>">

  <div class="cell">
    <div class="fixed-grid">
      <div class="grid">

        <div class="cell">
          <div class="field">
            <label class="label">Nom de l'entreprise</label>
            <div class="control">
              <input class="input" type="text"  name="nomEntreprise" required>
            </div>
          </div>
        </div>

        <div class="cell">
          <div class="field">
            <label class="label">Type d'organisation</label>
            <div class="control">
              <select name="type" class="select" required>
                <option value="" selected>Please choose</option>
                <option value="" selected>PME</option>
                <option value="" selected>Société individuelle</option>
                <option value="" selected>Administration publique</option>
                <option value="" selected>Association</option>
              </select>
            </div>
          </div>
        </div>
        <div class="cell">
          <div class="field">
            <label class="label">Adresse</label>
            <div class="control">
              <input type="text" class="input" name="adresse" required>
            </div>
          </div>
        </div>

        <div class="cell">
          <div class="field">
            <label  class="label">Complément d'adresse</label>
            <div class="control">
              <input type="text" class="input" name="adresse2">
            </div>
          </div>
        </div>

        <div class="cell">
          <div class="field">
            <label class="label">Code postal</label>
            <div class="control">
              <input type="text" class="input" name="codePostal" required>
            </div>
          </div>
        </div>

        <div class="cell">
          <div class="field">
            <label class="label">Ville</label>
            <div class="control">
              <input type="text" class="input" name="ville" required>
            </div>
          </div>
        </div>



        <div class="cell">
          <div class="field">
            <label  class="label">Code NAF</label>
            <div class="control">
              <input type="text" class="input" name="naf" required>
            </div>
          </div>
        </div>

        <div class="cell">
          <div class="field">
            <label class="label">SIRET</label>
            <div class="control">
              <input type="text" class="input" name="siret" required>
            </div>
          </div>
        </div>



        <div class="cell">
          <input type="submit" class="button" name="submit" value="Enregistrer">
        </div>

      </div>
    </div>
  </div>


</form>

<?php
// fichier vues/vue_modif_entreprise.php
require_once 'config/auth.php';
// require_once __DIR__ . '/../config/auth.php';
?>
<script>
  function getValue() {
    // Sélectionner l'élément input et récupérer sa valeur
    var input = document.getElementById("siret").value;

    var url = ("https://annuaire-entreprises.data.gouv.fr/etablissement/" + input);
    // Afficher la valeur . input;
    window.open(url, '_blank');
    this.focus();
  }
</script>

<div class="container is-fluid">

  <p class="title is-2">Importer entreprise</p>
  <p class="subtitle is-4">Depuis la base de données SIRENE</p>

  <?php if (!isset($isPopup)) { ?>

    <div class="notification is-success is-light">

      <p><i class="fa fa-thumbs-up"></i> &nbsp; Cette fonctionnalité importe automatiquement les dernières informations disponibles sur une entreprise depuis la base de données SIREN.
        Vous évitez ainsi d'insérer des informations éronnées ou obsolètes.</p> <br>
      <p>Vous pouvez récupérer les N° de SIRET :</p>

      <p>&nbsp; - &nbsp;Depuis la page <a href="../router.php?page=recherche"><i class="fa fa-search"></i> &nbsp; Recherche</a></p>
      <p>&nbsp; - &nbsp;Sur le site <a href="https://annuaire-entreprises.data.gouv.fr/" target="_blank">https://annuaire-entreprises.data.gouv.fr/</a></p>
    </div>

  <?php } ?>

  

  <form action="../controller/entreprise_create_siret.php" method="GET" class="form-group mb-3">
    <?= isset($isPopup) ? "<input type='hidden' name='isPopup' value='true'>" : "" ?>

    <input type="hidden" name="Created_UserID" value="<?= $_SESSION["userID"]; ?>">

    <label class="label" for="siret">Importez les données relatives à une entreprise à partir de son numéro de SIRET.</label>
    <div class="field">
      <div class="control">
        <input type="text" class="input is-normal" id="siret" name="siret" placeholder="Renseignez le N° de SIRET (14 caractères)" required minlength="14" maxlength="14" size="14">
      </div>
    </div>

    <div class="field">
      <div class="control">
        <?php if (!isset($isPopup)) { ?><button class="button is-link is-light" onclick="getValue();" type="button">Vérifier le N° de SIRET</button><?php } ?>
        <button class="button is-link" type="submit">Valider</button>
      </div>
    </div>
  </form>
</div>
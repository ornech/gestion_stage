<?php
// Votre code PHP pour récupérer et afficher les issues ici
require_once 'config/auth.php';
?>

<div class="field is-grouped is-grouped-multiline">
  <div class="control">
    <div class="tags has-addons is-medium">
      <span class="tag is-dark">Entreprises:</span>
      <span class="tag is-info"><?= "<b>" . count($entreprises) . "</b>" ?></span>
    </div>
  </div>
  <div class="control">
    <div class="tags has-addons is-medium">
      <span class="tag is-dark">Stages :</span>
      <span class="tag is-success"><?= "<b>" . count($stages) . "</b>" ?></span>
    </div>
  </div>
  <div class="control">
    <div class="tags has-addons is-medium">
      <span class="tag is-dark">Contacts :</span>
      <span class="tag is-warning"><?= "<b>" . count($contacts) . "</b>" ?></span>
    </div>
  </div>
</div>

<p class="is-size-1">Bienvenue <?= $_SESSION["utilisateur"]; ?></p>

<br>

<p class="is-size-3">Dates de stage actuel :</p>
<p class="is-size-5 alinea"><b>SIO 1</b> : <?= "Du <b>13 mai 2024</b> au <b>21 juin 2024</b> (Texte brut)" ?></p>
<p class="is-size-5 alinea"><b>SIO 2</b> : <?= "Du <b>10 novembre 2023</b> au <b>16 decembre 2023</b> (Texte brut)" ?></p>

<br>

<button class="button is-primary" id="downloadConvention">
  Télécharger la convention
</button>

<style>
  .alinea {
    margin-left: 20px;
  }
</style>
<?php
// Votre code PHP pour récupérer et afficher les issues ici
require_once 'config/auth.php';
?>



<p class="title is-1">Application Gestage BTS SIO</p>
<p class="subtitle is-3">Récherche et gestion de stages</p>
<div class="field is-grouped is-grouped-multiline">
  <div class="control">
    <div class="tags has-addons is-small">
      <span class="tag is-dark">Entreprises:</span>
      <span class="tag is-info"><?= "<b>" . count($entreprises) . "</b>" ?></span>
    </div>
  </div>
  <div class="control">
    <div class="tags has-addons is-small">
      <span class="tag is-dark">Stages :</span>
      <span class="tag is-success"><?= "<b>" . count($stages) . "</b>" ?></span>
    </div>
  </div>
  <div class="control">
    <div class="tags has-addons is-small">
      <span class="tag is-dark">Contacts :</span>
      <span class="tag is-warning"><?= "<b>" . count($contacts) . "</b>" ?></span>
    </div>
  </div>
</div>

<br>
<?php if ($_SESSION['statut'] == "Etudiant") { ?>
<div class="box">
<p class="subtitle is-3">Fonctionnement</p>

<div class="container">
     <div class="sequence-container">
         <div class="step">
           <p class="subtitle is-5">Étape 1 - Entreprise</p><BR>
           <p> - Rechercher une entreprise</p><BR>
           <p> - Insérer une entreprise</p><BR>
         </div>
         <div class="arrow-container">
             <div class="arrow"></div>
         </div>
         <div class="step">
           <p class="subtitle is-5">Étape 2 - Contact</p><BR>
           <p> - Ajouter un contat</p><BR>
           <p> - Renseignez les informations du contact</p><BR>
         </div>
         <div class="arrow-container">
             <div class="arrow"></div>
         </div>
         <div class="step">
           <p class="subtitle is-5">Étape 3 - Stage</p><BR>
           <p> - Créez votre stage</p><BR>
           <p> - Renseignez les informations</p><BR>
         </div>
     </div>
 </div>

</div>
<?php } ?>
<?php if ($_SESSION['statut'] == "Professeur") { ?>
<div class="box">
<p class="subtitle is-3">Stages à suivre</p>
</div>
<?php } ?>

<br>
<div class="box">
<p class="subtitle is-3">Dates de stages</p>
<p><b>SIO 1</b> : <?= "Du <b>13 mai 2024</b> au <b>21 juin 2024</b> (Texte brut)" ?></p>
<p><b>SIO 2</b> : <?= "Du <b>10 novembre 2023</b> au <b>16 decembre 2023</b> (Texte brut)" ?></p>
</div>

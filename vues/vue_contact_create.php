<?php
require_once 'config/auth.php';
?>

<div class="container is-fluid">
<form action="../controller/contact_create.php" method="post" class="g-3">
   <input type="hidden" name="idEntreprise" value="<?= $idEntreprise; ?>"/>  
   <?= isset($isPopup) ? "<input type='hidden' name='isPopup' value='true'>" : "" ?>

   <p class="h4 espacement">
      Information du nouveau contact :
   </p>

    
    <div class="field">
      <label class="label" for="nom">Nom<span style="color: red;">*</span></label>
      <div class="control">
        <input type="text" class="input" id="nom" name="nom" placeholder="Dupont" required>
      </div>
    </div>

    <div class="field">
    <label class="label" for="prenom">Prénom<span style="color: red;">*</span></label>
      <div class="control">
        <input type="text" class="input" id="prenom" name="prenom" placeholder="Alice" required>
      </div>
    </div>

    <div class="field">
      <label class="label" for="email">Email<span style="color: red;">*</span></label>
      <div class="control">
          <input type="email" class="input" id="email" name="email" placeholder="alicedupont@email.com" required>
      </div>
    </div>

    <div class="field">
      <label class="label" for="telephone">Téléphone</label>
        <div class="control">
          <input type="text" class="input" id="telephone" name="telephone" placeholder="06 07 08 09 10">
        </div>  
    </div>

    <div class="field">
      <label class="label" for="fonction">Fonction</label>
      <div class="control">
          <input type="text" class="input" id="fonction" name="fonction" placeholder="Responsable informatique">
      </div> 
    </div>

   <button class="button is-primary" name="submit" type="submit">Ajouter</button>

</form>

<style>
   .espacement{
      margin-top: 20px;
      margin-bottom: 20px;
   }
</style>

<script>

  document.querySelector('form').addEventListener('submit', function(event) {
    var email = document.getElementById('email').value;
    var telephone = document.getElementById('telephone').value;

    if ((!validateEmail(email) && email != "")) {
      event.preventDefault();
      alert("L'email n'est pas valide");
    }else if((!validatePhoneNumber(telephone) && telephone != "") ){
      event.preventDefault();
      alert("Le numéro de téléphone n'est pas valide");
    }
  });

</script>
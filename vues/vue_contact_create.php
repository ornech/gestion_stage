<?php
require_once 'config/auth.php';
?>

<form action="../controller/contact_create.php" method="post" class="g-3">
   <input type="hidden" name="idEntreprise" value="<?= $idEntreprise; ?>"/>  
   <p class="h4 espacement">
      Information du nouveau contact :
   </p>

  <div class="row">
      <div class="col">
         <div class="form-floating mb-3" style="width: 100%">
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Dupont" required>
            <label for="nom">Nom</label>
         </div>  
      </div>

      <div class="col">
         <div class="form-floating mb-3" style="width: 100%">
         <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Alice" required>
         <label for="prenom">Prénom</label>
         </div>  
      </div>
  </div>

   <div class="row">
      <div class="col">
         <div class="form-floating mb-3" style="width: 100%">
            <input type="email" class="form-control" id="email" name="email" placeholder="alicedupont@email.com">
            <label for="email">Email</label>
         </div>  
      </div>

      <div class="col">
         <div class="form-floating mb-3" style="width: 100%">
            <input type="text" class="form-control form-control-lg" id="telephone" name="telephone" placeholder="06 07 08 09 10">
            <label for="telephone">Téléphone</label>
         </div>  
      </div>
   </div>

   <div class="form-floating mb-3" style="width: 100%">
      <input type="text" class="form-control form-control-lg" id="fonction" name="fonction" placeholder="Responsable informatique">
      <label for="fonction">Fonction</label>
   </div> 

   <button class="btn btn-primary" name="submit" type="submit">Ajouter</button>

</form>

<style>
   .espacement{
      margin-top: 20px;
      margin-bottom: 20px;
   }
</style>
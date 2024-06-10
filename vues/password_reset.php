<?php
  $error_message = "";
  if(isset($_GET['erreur'])){
      $error_message = $_GET['erreur'];
  }
?>

<div class="columns is-centered" style="height: 100vh; align-items: center;">
  <div class="column is-one-third">

    <form class="box container" action="../controller/password_reset.php" method="post">
      <input type="hidden" name="userId" value="<?=$_SESSION['userID']?>">
      <fieldset>

      <!-- Form Name -->
      <legend class="is-size-3 mb-1">Nouveau mot de passe</legend>
      <p class="is-size-6 mb-4">Remplissez ce formulaire pour changer votre mot de passe.</p>

      <div class="field">
        <div class="control has-icons-left">
          <input id="password" name="new_password" class="input" type="password" placeholder="Mot de passe">
          <span class="icon is-small is-left">
            <i class="fas fa-lock"></i>
          </span>
        </div>
      </div>

      <div class="field">
        <div class="control has-icons-left">
          <input id="confirm_password" name="confirm_password" class="input" type="password" placeholder="Confirmer le mot de passe">
          <span class="icon is-small is-left">
            <i class="fas fa-lock"></i>
          </span>
        </div>
      </div>
      

      <?php if($error_message != ""):?>
        <div class="field">
          <div class="notification is-danger">
            <p>Erreur : <?=$error_message?></p>
          </div>
        </div>
      <?php endif; ?>

      <div class="field">
        <div class="control">
          <button id="valid" class="button is-success is-fullwidth" type="submit" value="Confirmer" disabled>Confirmer</button>
        </div>
      </div>

      </fieldset>

      <br>
      <p class="has-text-centered"><strong>BTS SIO</strong> - Lycée Merleau Ponty</p>
    </form>
  </div> 
</div>

<script>
  var password = document.getElementById("password")
  var confirm_password = document.getElementById("confirm_password");
  var button = document.getElementById("valid");


  function validatePassword(){
    if(password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Les mots de passe ne correspondent pas.");
      button.disabled = true;      
    } else if(password.value.length < 6) {
      confirm_password.setCustomValidity("Le mot de passe doit contenir au moins 6 caractères.");
      button.disabled = true;      
    } else {
      confirm_password.setCustomValidity('');
      button.disabled = false;      
    }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;
</script>
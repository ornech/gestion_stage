<?php
require_once 'config/auth.php';
?>

<p style="margin-top: 30px" class="h1"> Création profil</p>

<form action="../controller/create_user.php" method="post" class="g-3">

  <div class="row g-3 d-flex justify-content-center" style="margin-top: 20px">

    <p class="h4">
      Infomation de l'étudiant :
    </p>

    <div class="col-md">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nom" name="nom" placeholder="Dupont" required>
        <label for="nom">Nom</label>
      </div>  
    </div>

    <div class="col-md">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Alice" required>
        <label for="prenom">Prénom</label>
      </div>  
    </div>

  </div>

    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="email" name="email" placeholder="alicedupont@email.com">
      <label for="email">Email</label>
    </div>  

    <div class="form-floating mb-3" style="width: 350px">
      <input type="text" class="form-control form-control-lg" id="telephone" name="telephone" placeholder="06 07 08 09 10">
      <label for="telephone">Téléphone</label>
    </div>  

    <div class="col-md">
      <div class="form-floating mb-3" style="width: 350px">
        <input type="text" class="form-control form-control-lg" id="promo" name="promo" id placeholder="2025">
        <label for="promo">Promotion</label>
      </div>  
    </div>

    <div class="col-md">
      <select class="form-select" id="spe" name="spe" style="width: 250px">
        <option value="SLAM">SLAM</option>
        <option value="SISR">SISR</option>
      </select>
    </div>

    <p class="h4">
      Compte de l'étudiant :
    </p>

    <div class="row g-2 d-flex " style="margin-top: 10px">

    <div class="form-floating mb-2">
      <input type="text" class="form-control" id="login" name="login" placeholder="adupont" required>
      <label for="login" >Login</label>
    </div>  

    <div class="col-md">
      <div class="form-floating mb-2">
        <input type="password" class="form-control" id="password" name="password" placeholder="Azerty123!" required>
        <label for="password">Mot de passe</label>
      </div>  
    </div>

    <div class="col-md">
      <div class="form-floating mb-2">
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Azerty123!" required>
        <label for="confirm_password">Confirmer le mot de passe</label>
      </div>  
    </div>

  </div>

  <span id="confirm_error" style="color: red;"></span><br>


  <label for="statut">Statut (Temporaire) :</label>
  <select id="statut" name="statut" required>
    <option value="Etudiant">Etudiant</option>
    <option value="Professeur">Professeur</option>
    <!-- Ajoutez d'autres options selon vos besoins -->
  </select><br><br>

  <button class="btn btn-primary btn-lg" type="submit">Inscrire</button>
</form>


<script>
  // Sélectionne les champs nom et prénom
  const nomField = document.getElementById('nom');
  const prenomField = document.getElementById('prenom');
  const loginField = document.getElementById('login');
  
  nomField.addEventListener('change', createLogin);
  prenomField.addEventListener('change', createLogin);

  // fonction de création du login
  function createLogin() {
    //Si nomField et prenomField ne sont pas vide (J'ai mit dans le condition .value pour faire moin long car "" == false)
    if (nomField.value && prenomField.value) {
      let prenom = getLettrePrenom()

      let nom = nomField.value.substring(0,7).toLowerCase();
      console.log(nom);

      loginField.value = prenom + nom;
    }
  }

  // Cette fonction getLettrePrenom permet de donner les premières lettres du prenom pour le mettre dans le login
  // J'ai créé cette fonction pour une pas surplomber createLogin
  function getLettrePrenom(){
    result = prenomField.value.split(/[-\s]+/);

    for (let i = 0; i < result.length; i++){
      result[i] = result[i][0];
    }

    return result.join('').toLowerCase();
  }




  // Sélectionnez les champs de mot de passe
  const passwordField = document.getElementById('password');
  const confirmPasswordField = document.getElementById('confirm_password');
  // Sélectionnez les éléments pour afficher les messages d'erreur
  const passwordError = document.getElementById('password_error');
  const confirmError = document.getElementById('confirm_error');

  // Ajoutez un écouteur d'événement "change" aux champs de mot de passe
  passwordField.addEventListener('change', validatePassword);
  confirmPasswordField.addEventListener('change', validatePassword);

  // Fonction de validation des mots de passe
  function validatePassword() {
    // Récupérez les valeurs des champs de mot de passe
    const passwordValue = passwordField.value;
    const confirmPasswordValue = confirmPasswordField.value;

    // Vérifiez si les valeurs des champs de mot de passe sont identiques
    if (passwordValue !== confirmPasswordValue) {
      // Affichez un message d'erreur si les mots de passe ne correspondent pas
      confirmError.textContent = "Les mots de passe ne correspondent pas";
    } else {
      // Effacez le message d'erreur si les mots de passe correspondent
      confirmError.textContent = "";
    }
  }

</script>

<?php
require_once 'config/auth.php';
?>

<p style="margin-top: 30px" class="h1"> Création profil</p>

<form action="../controller/create_user.php" method="post" class="g-3">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <div style="margin-top: 15px; display: inline-flex; align-items: center;">
    <label  for="statut">Status de l'utilisateur :</label>
      <select class="form-select" id="statut" name="statut" required style="width: 150px; margin-left: 10px;" onchange=choixStatut()>
        <option value="Etudiant">Etudiant</option>
        <option value="Professeur">Professeur</option>
    </select>
  </div>

  <p class="h4 espacement">
    Infomation de l'utilisateur :
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

  <div class="row" id="divEtudiant">
    <div class="col">
      <div class="form-floating mb-3" style="width: 100%">
        <input type="text" class="form-control form-control-lg" id="promo" name="promo" placeholder="2025" maxlength="4">
        <label for="promo">Promotion</label>
      </div>  
    </div>

    <div class="col">
    <label for="spe">Spécialité</label>
      <select class="form-select form-select-lg" id="spe" name="spe" style="width: 250px">
        <option value="SLAM">SLAM</option>
        <option value="SISR">SISR</option>
      </select>
    </div>
  </div>

  <p class="h4 espacement">
    Compte de l'utilisateur :
  </p>

  <div class="espacement">
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="login" name="login" placeholder="adupont" style="width: 250px" required>
      <label for="login">Login</label>
    </div>
  </div>

  <!--Mot de passe par défaut
  <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" id="checkboxMDP" onclick="passwordParDefaut()">
    <label class="form-check-label" for="checkboxMDP" >
      Utiliser le mot de passe par défaut 
      <i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="Le mot de passe par défaut est <u>achanger</u>"></i>

    </label>
  </div> -->

  <div class="row" id="divPassword">
    <div class="col">
      <div class="form-floating mb-3" style="width: 100%">
        <input type="password" class="form-control" id="password" name="password" placeholder="Azerty123!" required>
        <label for="password">Mot de passe</label>
      </div>  
    </div>

    <div class="col">
      <div class="form-floating mb-3" style="width: 100%">
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Azerty123!" required>
        <label for="confirm_password">Confirmer le mot de passe</label>
      </div>  
    </div>
  </div>

  <span id="textError" style="color: red;"></span><br>

  <button id="buttonCreate" class="btn btn-success btn-lg" type="submit">Inscrire</button>
</form>

<script>

  //Toutes les récupération des balises utile pour le javaScript

  const checkboxMDP = document.getElementById("checkboxMDP"); //Le checkbox pour confirmer si le mot de passe par défaut est achanger
  const buttonCreate = document.getElementById("buttonCreate"); //Lorsque l'on clique sur le bouton Inscrire

  // Sélectionne les champs nom et prénom
  const nomField = document.getElementById('nom'); //Le champ de nom
  const prenomField = document.getElementById('prenom'); //Le champ de prénom

  const loginField = document.getElementById('login'); //Le champ de login
  const divPassword =document.getElementById('divPassword'); //Les enfants de cette div contient password et confirm_password
  const passwordField = document.getElementById('password'); // Le champ de password
  const confirmPasswordField = document.getElementById('confirm_password'); //Le champ de confirm_password

  const divEtudiant = document.getElementById('divEtudiant');
  const promo = document.getElementById('promo');
  const specification = document.getElementById('spe');
  const choix = document.getElementById('statut');

  let currentPromo = new Date().getFullYear() + 1;

  //Les évenements
  nom.addEventListener('change', createLogin);
  prenom.addEventListener('change', createLogin);
  passwordField.addEventListener('change', validatePassword);
  confirmPasswordField.addEventListener('change', validatePassword);
  promo.addEventListener('change', verifPromo);

  window.addEventListener("DOMContentLoaded", function() { //Lorsque la page est chargée
    //checkboxMDP.checked = true; //La checkbox se coche
    //passwordParDefaut(); //Appel de la fonction pour le mot de passe par achanger par défaut
    choixStatut();

    promo.value = currentPromo; //Augmenter la valeur de 1 à currentPromo pour avoir la prochaine promo du lycée par défaut

    //Ceci sert pour obtenir les icons sur bootstrap
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    
  }, false); 


  // fonction de création du login
  function createLogin() {
    //Si nomField et prenomField ne sont pas vide (J'ai mit dans le condition .value pour faire moin long car "" == false)
    if (nomField.value && prenomField.value) {
      let prenom = prenomField.value.split(/[-\s]+/);

      for (let i = 0; i < prenom.length; i++){
        prenom[i] = prenom[i][0];
      }

      prenom = prenom.join("").toLowerCase();

      let nom = nomField.value.split(/[-\s]+/).join("").toLowerCase();

      loginField.value = prenom + nom;
    }
  }

  // Sélectionnez les éléments pour afficher les messages d'erreur
  const textError = document.getElementById('textError');

  // Fonction de validation des mots de passe
  // function passwordParDefaut() {
  //   if (checkboxMDP.checked) {
  //     divPassword.classList.add('hidden');
  //     passwordField.value = "achanger";
  //     confirmPasswordField.value = "achanger";
  //     buttonCreate.disabled = false;
  //   } else {
  //     divPassword.classList.remove('hidden');
  //     passwordField.value = "";
  //     confirmPasswordField.value = "";
  //   }
  // }

  function validatePassword() {
    // Vérifiez si les valeurs des champs de mot de passe sont identiques
    if (passwordField.value != confirmPasswordField.value) {
      // Affichez un message d'erreur si les mots de passe ne correspondent pas
      textError.textContent = "Les mots de passe ne correspondent pas";
      buttonCreate.disabled = true;
    } else {
      // Effacez le message d'erreur si les mots de passe correspondent
      textError.textContent = "";
      buttonCreate.disabled = false;
    }
  }

  function choixStatut(){
    if (choix.value == "Professeur") {
      divEtudiant.classList.add('hidden');
      specification.value = "";
      promo.value = currentPromo;
    }
    else {
      divEtudiant.classList.remove('hidden');
      specification.value = "SLAM";
    }
  }

  function verifPromo(){
    if (isNaN(parseInt(promo.value))) {
      promo.value = currentPromo;
    }
    if (promo.value > currentPromo + 1) {
      promo.value = currentPromo;
    }
  }
  
</script>

<!-- Du CCS pour corriger le problème d'espacement -->
<style>
  .col-md{
    flex: 0 0 0%;
  }
  .row{
    flex-wrap: wrap;
  }
  .espacement{
    padding-top: 20px;
  }
  .hidden{
    display: none !important;
  }
</style>
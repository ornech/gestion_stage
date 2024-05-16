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

  <p class="h6">Le mot de passe qui sera attribué automatiquement sera : <u>achanger</u></p>

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

  const divEtudiant = document.getElementById('divEtudiant');
  const promo = document.getElementById('promo');
  const choix = document.getElementById('statut');

  let currentPromo = new Date().getFullYear() + 1;

  //Les évenements
  nom.addEventListener('change', createLogin);
  prenom.addEventListener('change', createLogin);
  promo.addEventListener('change', verifPromo);

  window.addEventListener("DOMContentLoaded", function() { //Lorsque la page est chargée
    choixStatut();

    promo.value = currentPromo; //Augmenter la valeur de 1 à currentPromo pour avoir la prochaine promo du lycée par défaut    
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


  function choixStatut(){
    if (choix.value == "Professeur") {
      divEtudiant.classList.add('hidden');
      promo.value = currentPromo;
    }
    else {
      divEtudiant.classList.remove('hidden');
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
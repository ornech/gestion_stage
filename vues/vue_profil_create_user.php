<?php
require_once 'config/auth.php';
?>
<style>
  .blue-line-bottom {
    border-bottom: 2px solid #00d1b2;
  }
  .espacement{
    padding-top: 20px;
  }
  .hidden{
    display: none !important;
  }
  .max-width {
    width: 100%;  
  }

</style>

  <div class="box">
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-three-quarters">
        <p class="title is-2 has-text-centered blue-line-bottom mb-4">Ajouter utilisateur</p>
        <p class="subtitle is-4 has-text-centered">Création manuelle d'un compte utilisateur</p>

        <form action="../controller/create_user.php" method="post" class="g-3">

          <label class="label" for="statut">Statut de l'utilisateur</label>
          <div class="field">
            <div class="select">
              <select id="statut" name="statut" required onchange="choixStatut()">
                <option value="Etudiant">Etudiant</option>
                <option value="Professeur">Professeur</option>
              </select>
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-body">
              <div class="field">
                <label class="label" for="nom">Nom</label>
                <div class="control">
                  <input type="text" class="input" id="nom" name="nom" placeholder="Dupont" required>
                </div>
              </div>
              <div class="field">
                <label class="label" for="prenom">Prénom</label>
                <div class="control">
                  <input type="text" class="input" id="prenom" name="prenom" placeholder="Alice" required>
                </div>
              </div>
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-body">
              <div class="field">
                <label class="label" for="email">Email</label>
                <div class="control">
                  <input type="email" class="input" id="email" name="email" placeholder="alicedupont@email.com">
                </div>
              </div>
              <div class="field">
                <label class="label" for="telephone">Téléphone</label>
                <div class="control">
                  <input type="text" class="input" id="telephone" name="telephone" placeholder="06 00 00 00 00">
                </div>
              </div>
              <div class="field" id="divDateEntree">
                <label class="label" for="dateEntree">Date d'entrée</label>
                <div class="control">
                  <input type="date" class="input" id="dateEntree" name="dateEntree" ondblclick="this.showPicker()" required value="<?php echo date('Y-m-d'); ?>">
                </div>
              </div>
            </div>
          </div>

          <div class="field is-horizontal" id="divEtudiant">
            <div class="field-body">

              

              <div class="field">
                <label class="label" for="promo">Promotion</label>
                <div class="control">
                  <input type="text" class="input" id="promo" name="promo" placeholder="2025" maxlength="4">
                </div>
              </div>

              <div class="field">
                <label class="label" for="classe">Classe</label>
                <div class="control">
                  <div class="select max-width">
                    <select class="max-width" id="classe" name="classe">
                      <option value="SIO1">SIO1</option>
                      <option value="SIO2">SIO2</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="field">
                <label class="label" for="spe">Spécialité</label>
                <div class="control">
                  <div class="select max-width">
                    <select class="max-width" id="spe" name="spe">
                      <option value="Aucune">Aucune</option>
                      <option value="SLAM">SLAM</option>
                      <option value="SISR">SISR</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="field">
              <label class="label" for="redoublant">Élève redoublant</label>
              <div class="control">
                <input type="checkbox" class="checkbox" id="redoublant" name="redoublant">
              </div>
              </div>

            </div>
          </div>
          <!-- //// -->

          <div class="field is-horizontal">
            <div class="field-body">
              <div class="field">
                <label class="label" for="login">Login suggéré</label>
                <div class="control">
                  <input type="text" class="input" id="login" name="login" placeholder="alice.dupont" required>
                </div>
              </div>
              <div class="field">
                <article class="message is-primary">
                <div class="message-body">
                  <p>Le mot de passe par défaut est : <strong>achanger</strong></p>
                  <p>Il devra être changé à la première connexion</p>          
                </article>
              </div>
            </div>
          </div>
            
          <div class="field">
            <div class="control espacement">
              <button id="buttonCreate" class="button is-primary" type="submit">Créer utilisateur</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
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
  const dateEntree = document.getElementById('dateEntree');
  const divDateEntree = document.getElementById('divDateEntree');

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
      function removeAccents(str) {
        return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
      }

      let prenom = removeAccents(prenomField.value).split(/[-\s]+/);

      prenom = prenom.join("").toLowerCase();

      let nom = removeAccents(nomField.value).split(/[-\s]+/).join("").toLowerCase();

      let login = nom + "." + prenom;

      loginField.value = login;
    }
  }

  function choixStatut(){
    if (choix.value == "Professeur") {
      dateEntree.required = false;
      divDateEntree.classList.add('hidden');
      divEtudiant.classList.add('hidden');
      promo.value = currentPromo;
    }
    else {
      dateEntree.required = true;
      divDateEntree.classList.remove('hidden');
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


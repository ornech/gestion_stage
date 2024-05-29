<?php
require_once 'config/auth.php';
?>

<div class="container">
  <div class="columns is-centered">
    <div class="column is-half">
      <h1 class="title is-1 has-text-centered">Créer un stage</h1>

      <form action="router.php" method="post">
        <input type="hidden" name="idEtudiant" value="">
        <input type="hidden" name="idEntreprise" value="">
        <input type="hidden" name="idMaitreDeStage" value="">

        <label class="label" for="nameEtudiant">Étudiant</label>
        <div class="field has-addons">
          <div class="control is-expanded">
            <input type="text" class="input is-info" placeholder="Veuillez selectionner un étudiant" id="nameEtudiant" onchange="checkForm()" disabled>
          </div>
          <p class="control">
            <a class="button is-info" onclick="openPopup('vue_popup_select_etu')" >Selectionner</a>
          </p>
        </div>

        <label class="label" for="nameEntreprise">Entreprise</label>
        <div class="field has-addons">
          <div class="control is-expanded">
            <input type="text" class="input is-info" placeholder="Veuillez selectionner une entreprise" id="nameEntreprise" onchange="checkForm()" disabled>
          </div>
          <p class="control">
            <a class="button is-info" onclick="openPopup('vue_popup_select_entreprise')" >Selectionner</a>
          </p>
        </div>

        <label class="label" for="nameMaitreDeStage">Maitre de stage</label>
        <div class="field has-addons">
          <div class="control is-expanded">
            <input type="text" class="input is-info" placeholder="Veuillez selectionner un maitre de stage" id="nameMaitreDeStage" onchange="checkForm()" disabled>
          </div>
          <p class="control">
            <button class="button is-info" id="btnMaitreDeStage" onclick="openPopup('vue_popup_select_maitredestage')" disabled >Selectionner</h>
          </p>
        </div>

        <div class="assemble">
          <div class="field">
            <label class="label">Date de début</label>
            <div class="control">
              <input class="input" type="date" name="start_date" id="start_date" onchange="checkForm()">
            </div>
          </div>

          <div class="field">
            <label for="duree" class="label">Durée du stage</label>
            <div class="control has-icons-left">
              <div class="select">
                <select id="duree" name="duree" onchange="checkForm()">
                  <option value="6" selected>6</option>
                  <option value="5">5</option>
                  <option value="4">4</option>
                </select>
              </div>
              <span class="icon is-small is-left">
                <i class="fas fa-clock"></i>
              </span>
            </div>
          </div>  

        </div>

        <div class="field">
          <div class="control">
            <button class="button is-primary" id="submitForm" disabled>Créer</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  var popupAlreadyOpened = false;

  function openPopup(route) {
    if(popupAlreadyOpened == true) return;
    popupAlreadyOpened = true;
    var popup = window.open("router.php?page=" + route, "_blank", "popup");
    // Attendre la réponse de la popup
    window.addEventListener("message", function(event) {
      if (event.origin === window.location.origin) {
      var response = event.data;
      console.log("Réponse de la popup :", response);
      window.removeEventListener("message", arguments.callee);
      popupAlreadyOpened = false;
      }
    });
  }

  //Vérifie si tout est rempli, si oui activé le bouton Créer
  function checkForm() {
    console.log("Checking form...");
    var idEtudiant = document.getElementById("idEtudiant").value;
    var idEntreprise = document.getElementById("idEntreprise").value;
    var idMaitreDeStage = document.getElementById("idMaitreDeStage").value;
    var start_date = document.getElementById("start_date").value;
    var duree = document.getElementById("duree").value;

    if (idEtudiant != "" && idEntreprise != "" && idMaitreDeStage != "" && start_date != "" && duree != "") {
      document.getElementById("submitForm").disabled = false;
    } else {
      document.getElementById("submitForm").disabled = true;
    }

    if(idEtudiant != "" && idEntreprise != ""){
      document.getElementById("btnMaitreDeStage").disabled = false;
    }
    else{
      document.getElementById("btnMaitreDeStage").disabled = true;
    }

  }

</script>

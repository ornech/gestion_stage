<?php
require_once 'config/auth.php';
?>

<div class="container">
  <div class="columns is-centered">
    <div class="column is-half">
      <h1 class="title is-1 has-text-centered">Créer un stage</h1>

      <form action="router.php" method="post">
        <input type="hidden" id="idEtudiant" name="idEtudiant" value=""/>
        <input type="hidden" id="idEntreprise" name="idEntreprise" value="">
        <input type="hidden" id="idMaitreDeStage" name="idMaitreDeStage" value="">

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
          <p class="control">
            <a class="button is-primary" onclick="openPopup('vue_popup_create_entreprise')" >Importer</a>
          </p>
        </div>

        <label class="label" for="nameMaitreDeStage">Maitre de stage</label>
        <div class="field has-addons">
          <div class="control is-expanded">
            <input type="text" class="input is-info" placeholder="Veuillez selectionner un maitre de stage" id="nameMaitreDeStage" onchange="checkForm()" disabled>
          </div>
          <p class="control">
            <button type="button" class="button is-info" id="btnSelectMaitreDeStage" disabled >Selectionner</button>
          </p>
          <p class="control">
            <a class="button is-primary" id="btnCreateMaitreDeStage">Créer</a>
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
                  <option value="6" selected>6 semaines</option>
                  <option value="5">5 semaines</option>
                  <option value="4">4 semaines</option>
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
    var popup = window.open("router.php?page=" + route, "_blank",  "width=700, height=600");
    // Attendre la réponse de la popup
    window.addEventListener("message", function(event) {
      if (event.origin === window.location.origin) {
      var response = event.data;

      if(response.statut == "success"){
        processResponse(response.contents);
      }else if(response.statut == "cancel"){
        console.log("Opération annulée");
        console.log(response);
      }else{
        console.log("Erreur lors de la récupération des données");
      }

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
      document.getElementById("btnSelectMaitreDeStage").disabled = false;
      document.getElementById("btnCreateMaitreDeStage").disabled = false;
    }
    else{
      document.getElementById("btnCreateMaitreDeStage").disabled = true;
      document.getElementById("btnCreateMaitreDeStage").disabled = true;
    }

  }

  function processResponse(response){
    if(response["type"] == "profil"){
      console.log(response)
      document.getElementById("idEtudiant").value = response["id"];
      document.getElementById("nameEtudiant").value = response["nom"] + " " + response["prenom"];
    }else if(response["type"] == "entreprise"){
      console.log(response)
      document.getElementById("idEntreprise").value = response["id"];
      document.getElementById("nameEntreprise").value = response["nom"];

      //Add attribute to the button btnSelectMaitreDeStage and btnCreateMaitreDeStage onclick openPopup('vue_popup_select_maitredestage')
      document.getElementById("btnSelectMaitreDeStage").setAttribute("onclick", "openPopup('vue_popup_select_maitredestage&idEntreprise=" + response["id"] + "')");
      document.getElementById("btnCreateMaitreDeStage").setAttribute("onclick", "openPopup('vue_popup_create_maitredestage&idEntreprise=" + response["id"] + "')");

    }else if(response["type"] == "contact"){
      console.log(response)
      document.getElementById("idMaitreDeStage").value = response["id"];
      document.getElementById("nameMaitreDeStage").value = response["nom"] + " " + response["prenom"];
    }

    checkForm();
  }

</script>

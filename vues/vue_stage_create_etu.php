<?php
require_once 'config/auth.php';

$maitreDeStages = [];
json_encode(array_map(function($contact) use (&$maitreDeStages) {
    // Le & est comme dans le langage C, il permet de pouvoir modifier la variable dans la fonction
    $maitreDeStages[$contact->EmployeID] = [
      'id' => $contact->EntrepriseID,
      'nom' => $contact->nom,
      'prenom' => $contact->prenom
    ];
  }, $contacts));

  //var_dump($profil);

  //impression de la variable $maitreDeStages dans une variable javascript
  echo "<script> var maitreDeStages = ".json_encode($maitreDeStages)."; </script>";

?>

<div class="box">
<div class="container">
  <div class="columns is-centered">
    <div class="column is-half">
      <h1 class="title is-1 has-text-centered">Créer un stage</h1>

      <form action="/controller/stage_create.php" method="post">
        <input type="hidden" id="idEtudiant" name="idEtudiant" value="<?= $_SESSION["userID"] ?>"/>
        <input type="hidden" id="idEntreprise" name="idEntreprise" value="">
        <input type="hidden" id="idMaitreDeStage" name="idMaitreDeStage" value="">
        <input type="hidden" id="classe" name="classe" value="<?= $profil->classe ?>">

        <label class="label" for="nameEtudiant"><span class="icon">
  <i class="fas fa-graduation-cap"></i>
</span> Étudiant</label>
        <div class="field has-addons">
          <div class="control is-expanded">
            <input type="text" class="input" value="<?= $profil->nom ?> <?= $profil->prenom ?>" id="nameEtudiant" readonly>
          </div>
        </div>

        <label class="label" for="nameEntreprise"><span class="icon">
  <i class="fas fa-building"></i>
</span> Entreprise</label>
        <div class="field has-addons">
          <div class="control is-expanded">
            <input type="text" class="input is-info" placeholder="Veuillez selectionner une entreprise" id="nameEntreprise" onchange="checkForm()" disabled>
          </div>
          <p class="control">
            <a class="button is-info" onclick="openPopup('vue_popup_select_entreprise')">Selectionner</a>
          </p>
          <p class="control">
            <a class="button is-primary" onclick="openPopup('vue_popup_create_entreprise')">Importer</a>
          </p>
        </div>

        <label class="label" for="nameMaitreDeStage"> <span class="icon">
  <i class="fas fa-user"></i>
</span> Maitre de stage</label>
        <div class="field has-addons">
          <div class="control is-expanded">
            <div class="select" style="width: 100%;">
              <select class="input" placeholder="Veuillez selectionner un maitre de stage" id="nameMaitreDeStage" onchange="idMDSchange(this)">
              </select>
            </div>
          </div>
          <p class="control">
            <button type="button" class="button is-primary" id="btnCreateMaitreDeStage" disabled>Créer</button>
          </p>
        </div>

        <div class="assemble">
          <div class="field">
            <label class="label">Date de début</label>
            <div class="control">
              <input class="input" type="date" name="dateDebut" id="dateDebut" onchange="checkForm()" ondblclick="this.showPicker()">
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
          </div>  </div> 
          <div class="field">
  <div class="control"> 
    <button class="button is-primary" type="submit" id="submitForm" disabled>Enregistrer</button>
  </div>
</div>
           

          </div>

        </div>



      </form>
    </div>
  </div>
</div></div>

<?php


    $dateDebut = $_POST['dateDebut'] ?? null;
    $duree = $_POST['duree'] ?? null;

    // Convertir la durée en jours
    $dureeEnJours = $duree * 7;
    $dateFin = date('Y-m-d', strtotime($dateDebut . ' +' . $dureeEnJours . ' days'));


?>




<script type="text/javascript">
  var popupAlreadyOpened = false;

  function openPopup(route) {
    if(popupAlreadyOpened == true) return;
    popupAlreadyOpened = true;
    var popup = window.open("router.php?page=" + route, "_blank",  "width=700, height=600");

    // setTimeout tout les 1/2 secondes pour essayer de voir si on peut toujours communiquer avec la popup si non removeEventListener message
    var interval = setInterval(function(){
      if(popup.closed){
        clearInterval(interval);
        window.removeEventListener("message", arguments.callee);
        popupAlreadyOpened = false;
      }
    }, 500);

    window.addEventListener("message", handleMessage);
  }

  function handleMessage(event) {
    if (event.origin !== window.location.origin) return;
    var response = event.data;

    if (response.statut === "success") {
      processResponse(response.contents);
    } else if (response.statut === "cancel") {
      console.log("Opération annulée");
    } else {
      console.log("Erreur lors de la récupération des données");
    }

    window.removeEventListener("message", handleMessage);
    popupAlreadyOpened = false;
  }

  function checkForm() {
    var idEntreprise = document.getElementById("idEntreprise").value;
    var idMaitreDeStage = document.getElementById("idMaitreDeStage").value;
    var start_date = document.getElementById("dateDebut").value;
    var duree = document.getElementById("duree").value;

    var isFormValid = idEntreprise && idMaitreDeStage && start_date && duree;
    document.getElementById("submitForm").disabled = !isFormValid;

    if (idEntreprise) {
      console.log("idEntreprise: " + idEntreprise);
      printMaitreDeStage(idEntreprise);
      document.getElementById("nameMaitreDeStage").disabled = false;
      document.getElementById("btnCreateMaitreDeStage").disabled = false;
    } else {
      document.getElementById("nameMaitreDeStage").disabled = true;
      document.getElementById("btnCreateMaitreDeStage").disabled = true;
    }
  }

  function processResponse(response) {
    if (response.type === "profil") {
      document.getElementById("idEtudiant").value = response.idEtudiant;
      document.getElementById("nameEtudiant").value = response.nameEtudiant;
      document.getElementById("classe").value = response.classe;
    } else if (response.type === "entreprise") {
      document.getElementById("idEntreprise").value = response.id;
      document.getElementById("nameEntreprise").value = response.nom;

      document.getElementById("btnCreateMaitreDeStage").setAttribute("onclick", "openPopup('vue_popup_create_maitredestage&idEntreprise=" + response.id + "')");
    } else if (response.type === "contact") {
  document.getElementById("idMaitreDeStage").value = response.id;
  document.getElementById("nameMaitreDeStage").value = response.nom + " " + response.prenom;

  // Mise à jour de maitreDeStages avec l'ID de l'entreprise correct
  maitreDeStages[response.id] = {
    id: response.idEntreprise,  // Utiliser response.idEntreprise ici
    nom: response.nom,
    prenom: response.prenom
  };
 
      printMaitreDeStage(document.getElementById("idEntreprise").value);
    }

    checkForm();
  }

  function printMaitreDeStage(entrepriseId) {
    var select = document.getElementById("nameMaitreDeStage");
    select.innerHTML = "";
    var idMaitreDeStage = document.getElementById("idMaitreDeStage").value;

    for (const [key, value] of Object.entries(maitreDeStages)) {
      if (value.id === entrepriseId) {
        select.innerHTML += `<option value="${key}" ${key === idMaitreDeStage ? "selected" : ""}>${value.nom} ${value.prenom}</option>`;
      }
    }
    idMDSchange(select);
  }

  function idMDSchange(select) {
    document.getElementById("idMaitreDeStage").value = select.value;
  }

  document.addEventListener('DOMContentLoaded', function() {

    document.getElementById("nameEntreprise").addEventListener('change', checkForm);
    document.getElementById("dateDebut").addEventListener('change', checkForm);
    if (document.getElementById("dateFin")) {
        document.getElementById("dateFin").addEventListener('change', checkForm);
    }
});
</script>

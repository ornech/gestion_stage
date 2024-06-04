<?php
require_once 'config/auth.php';
?>
<style>
   .orange-line-bottom {
            border-bottom: 2px solid orange;
        }
        </style>


<?php if(isset($Stage)): 
  function getWeeksDifference($dateDebut, $dateFin) {
    $start = new DateTime($dateDebut);
    $end = new DateTime($dateFin);
    $interval = $start->diff($end);
    $weeks = floor($interval->days / 7);
    return $weeks;
  }

  $weeks = 0;
  if(isset($Stage->dateDebut) && isset($Stage->dateFin)){
    $weeks = getWeeksDifference($Stage->dateDebut, $Stage->dateFin);
  }

  $maitreDeStages = [];
  json_encode(array_map(function($contact) use (&$maitreDeStages) { // Le & est comme dans le langage C, il permet de pouvoir modifier la variable dans la fonction
    $maitreDeStages[$contact->EmployeID] = [
      'id' => $contact->EntrepriseID,
      'nom' => $contact->nom,
      'prenom' => $contact->prenom
    ];
  }, $contacts));

  //impression de la variable $maitreDeStages dans une variable javascript
  echo "<script> const maitreDeStages = ".json_encode($maitreDeStages)."; </script>";

?>

<div class="container">
  <div class="columns is-centered">
    <div class="column is-three-quarters">
      <h1 class="title is-2 has-text-centered orange-line-bottom mb-4">Stage <?= $Stage -> classe ?>:  <?= $Stage->EtudiantNom . " ". $Stage->EtudiantPrenom?></h1>

      <form action="/controller/stage_edit.php" method="post">
        <input type="hidden" id="idEtudiant" name="idEtudiant" value="<?= $Stage->idEtudiant?>">
        <input type="hidden" id="idEntreprise" name="idEntreprise" value="<?= $Stage->idEntreprise?>">
        <input type="hidden" id="idMaitreDeStage" name="idMaitreDeStage" value="<?= $Stage->idMaitreDeStage?>">
        <input type="hidden" id="classe" name="classe" value="<?= $Stage->classe?>">

        <label class="label" for="nameEntreprise">Entreprise</label>
        <div class="field has-addons">
          <div class="control is-expanded">
            <input type="text" class="input is-info" placeholder="Veuillez selectionner une entreprise" id="nameEntreprise" value="<?= $Stage->Entreprise?>" onchange="checkForm()" disabled>
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
            <div class="select" style="width: 100%;">
              <select class="input" placeholder="Veuillez selectionner un maitre de stage" id="nameMaitreDeStage" value="<?= $Stage->employe_nom . " " . $Stage->employe_prenom ?>" onchange="idMDSchange(this)">
          
                <script>
                  function printMaitreDeStage($entrepriseId){
                    var select = document.getElementById("nameMaitreDeStage");
                    select.innerHTML = "";
                    var idMaitreDeStage = document.getElementById("idMaitreDeStage").value;
                    select.innerHTML = "";
                    for (const [key, value] of Object.entries(maitreDeStages)) {
                      if(value.id == $entrepriseId){
                  select.innerHTML += '<option value="' + key + '" ' + (key == idMaitreDeStage ? "selected" : "") + '>' + value.nom + " " + value.prenom + '</option>';
                      }
                    }
                  }

                  printMaitreDeStage(<?php echo $Stage->idEntreprise ?>);
                </script>

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
              <input class="input" type="date" name="dateDebut" id="dateDebut" value="<?= $Stage->dateDebut?>" onchange="checkForm()">
            </div>
          </div>

          <div class="field">
            <label for="duree" class="label">Durée du stage</label>
            <div class="control has-icons-left">
              <div class="select">
                <select id="duree" name="duree" onchange="checkForm()">
                  <option value="6" <?= $weeks == 6 || ($weeks != 5 && $weeks != 4) ? "selected" : ""?>>6 semaines</option>
                  <option value="5" <?= $weeks == 5 ? "selected" : ""?>>5 semaines</option>
                  <option value="4" <?= $weeks == 4 ? "selected" : ""?>>4 semaines</option>
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
  var countIsNotDetectable = 0;

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

    // Attendre la réponse de la popup
    window.addEventListener("message", function(event) {
      if (event.origin === window.location.origin) {
      var response = event.data;

      if(response.statut == "success"){
        processResponse(response.contents);
      }else if(response.statut == "cancel"){
        console.log("Opération annulée");
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

    var idEntreprise = document.getElementById("idEntreprise").value;
    var idMaitreDeStage = document.getElementById("idMaitreDeStage").value;
    var start_date = document.getElementById("dateDebut").value;
    var duree = document.getElementById("duree").value;

    printMaitreDeStage(idEntreprise);

    if (idEntreprise != "" && idMaitreDeStage != "" && start_date != "" && duree != "") {
      document.getElementById("submitForm").disabled = false;
    } else {
      document.getElementById("submitForm").disabled = true;
    }

    if(idEntreprise != ""){
      document.getElementById("btnCreateMaitreDeStage").disabled = false;
      document.getElementById("btnCreateMaitreDeStage").setAttribute("onclick", "openPopup('vue_popup_create_maitredestage&idEntreprise=" + idEntreprise + "')");
    }
    else{
      document.getElementById("btnCreateMaitreDeStage").disabled = true;
      document.getElementById("btnCreateMaitreDeStage").removeAttribute("onclick");
    }

  }

  function processResponse(response){
    if(response["type"] == "entreprise"){
      document.getElementById("idEntreprise").value = response["id"];
      document.getElementById("nameEntreprise").value = response["nom"];

      document.getElementById("idMaitreDeStage").value = "";
      document.getElementById("nameMaitreDeStage").value = "";

      //Add attribute to the button btnSelectMaitreDeStage and btnCreateMaitreDeStage onclick openPopup('vue_popup_select_maitredestage')
      document.getElementById("btnCreateMaitreDeStage").setAttribute("onclick", "openPopup('vue_popup_create_maitredestage&idEntreprise=" + response["id"] + "')");

    }else if(response["type"] == "contact"){
      document.getElementById("idMaitreDeStage").value = response["id"];
      document.getElementById("nameMaitreDeStage").value = response["nom"] + " " + response["prenom"];
      var idEntreprise = document.getElementById("idEntreprise").value;

      maitreDeStages[response["id"]] = {
        id: idEntreprise,
        nom: response["nom"],
        prenom: response["prenom"]
      };

      printMaitreDeStage(idEntreprise);
    }

    checkForm();
  }

  function idMDSchange(select){
    document.getElementById("idMaitreDeStage").value = select.value;
    checkForm();
  }

  addEventListener("DOMContentLoaded", checkForm());

</script>


<?php endif; ?>
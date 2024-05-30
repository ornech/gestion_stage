<?php
  require_once 'config/auth.php';
?>

<script>const type = <?php if(isset($profils)){echo "\"profil\"";} else if(isset($entreprises)){echo "\"entreprise\"";} else if(isset($contacts)){echo "\"contact\"";} ?>;</script>
<?php  
  if(isset($profils)){
?>

<p class="title is-3 has-text-centered">Cliquez sur un étudiant pour l'ajouter</p>
<table class="table table-hover tableFilter is-fullwidth" id="maTable">
  <thead>
    <tr>
      <td class="lineFilter" name="Nom"></td>
      <td class="lineFilter" name="Prénom"></td>
      <td class="lineFilter" name="Classe"></td>
      <td class="lineFilter" name="Spécialité"></td>
    </tr>
  </thead>
  <tbody>
    <?php foreach($profils as $profil):?>

      <tr class="content" style="cursor: pointer;" id="<?= $profil->id ?>">
        <td id="nom"><?=$profil->nom?></td>
        <td id="prenom"><?=$profil->prenom?></td>
        <td id="classe"><?=$profil->classe?></td>
        <td><?=$profil->spe?></td>
      </tr>

    <?php endforeach;?>
  </tbody>
</table>

<?php
  }else if(isset($entreprises)){
?>

<p class="title is-3 has-text-centered">Cliquez sur une entreprise pour l'ajouter</p>
<table class="table table-hover tableFilter is-fullwidth" id="maTable">
  <thead>
    <tr>
      <td class="lineFilter" name="Nom"></td>
      <td class="lineFilter" name="Adresse"></td>
      <td class="lineFilter" name="Ville"></td>
      <td class="lineFilter" name="Siret"></td>
    </tr>
  </thead>
  <tbody>
    <?php foreach($entreprises as $entreprise):?>

      <tr class="content" style="cursor: pointer;" id="<?= $entreprise->id ?>">
        <td id="nom"><?=$entreprise->nomEntreprise?></td>
        <td><?=$entreprise->adresse?></td>
        <td><?=$entreprise->ville?></td>
        <td><?=$entreprise->siret?></td>
      </tr>

    <?php endforeach;?>
  </tbody>
</table>

<?php
  }else if(isset($contacts)){
?>

<p class="title is-3 has-text-centered">Cliquez sur un contact pour l'ajouter</p>
<table class="table table-hover tableFilter is-fullwidth" id="maTable">
  <thead>
    <tr>
      <td class="lineFilter" name="Nom"></td>
      <td class="lineFilter" name="Prénom"></td>
    </tr>
  </thead>
  <tbody>
    <?php foreach($contacts as $contact):?>

      <tr class="content" style="cursor: pointer;" id="<?= $contact->EmployeID ?>">
        <td id="nom"><?=$contact->nom?></td>
        <td id="prenom"><?=$contact->prenom?></td>
      </tr>

    <?php endforeach;?>
  </tbody>
</table>

<?php
  } else{}
?>

<script>
  document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('tr[class="content"]').forEach(function(line){
      line.addEventListener('click', function(){
        initToSend(line);
      });
    });
  });

  function initToSend(line){
    
    let result = {
      statut: "success",
      contents: {
        type: type,
        id: line.id,
      }
    };

    line.querySelectorAll('td').forEach(function(td) {
      let id = td.getAttribute('id');
      let value = td.textContent.trim();
      result.contents[id] = value;
    });

    sendResponse(result);
    window.close();

  }

  window.addEventListener("unload", function() {
    sendResponse({statut: "cancel"}, "/");
    window.close();
  });
</script>
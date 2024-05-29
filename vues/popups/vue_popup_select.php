<?php
  require_once 'config/auth.php';
?>

<script>const type = <?php if(isset($profils)){echo "\"profil\"";} else if(isset($entreprises)){echo "\"entreprise\"";} ?>;</script>
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

      <tr style="cursor: pointer;" id="<?= $profil->id ?>">
        <td id="nom"><?=$profil->nom?></td>
        <td id="prenom"><?=$profil->prenom?></td>
        <td><?=$profil->classe?></td>
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

      <tr style="cursor: pointer;" id="<?= $entreprise->id ?>">
        <td id="nom"><?=$entreprise->nomEntreprise?></td>
        <td><?=$entreprise->adresse?></td>
        <td><?=$entreprise->ville?></td>
        <td><?=$entreprise->siret?></td>
      </tr>

    <?php endforeach;?>
  </tbody>
</table>

<?php
  } else{}
?>








<script>
  document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('tr').forEach(function(line){
      line.addEventListener('click', function(){
        console.log("Clicked: " + line.id);
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
    console.log(window.location);
    sendResponse({statut: "cancel", why: window.location}, "/");
    window.close();
  });
</script>
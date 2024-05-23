<?php
require_once 'config/auth.php';
?>
<BR>
<div class="content">

  <div class="notification is-success is-light">
    <H5> Importation </H5>
    1) Exporter une liste des étudiants depuis pronote<BR>
       Mes données > Classes/Elèves > Sélectionnez votre classe <BR>
    2) cliquez sur le bouton d'exportation <BR>
    3) Sélectionnez votre fichier csv

  </div>

<form action="../controller/controller_import_pronote.php" method="post" enctype="multipart/form-data">
    Sélectionnez un fichier CSV :
    <div id="file-js-example" class="file has-name">
      <label class="file-label">
        <input class="file-input" type="file" type="file"  name="csv_file" accept=".csv" />
        <span class="file-cta">
          <span class="file-icon">
            <i class="fas fa-upload"></i>
          </span>
          <span class="file-label"> CSV </span>
        </span>
        <span class="file-name"> Aucun fichier sélectionné </span>
      </label>
    </div>

    <input type="submit" name="submit" value="Importer">
</form>
</div>


<script>
  const fileInput = document.querySelector("#file-js-example input[type=file]");
  fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
      const fileName = document.querySelector("#file-js-example .file-name");
      fileName.textContent = fileInput.files[0].name;
    }
  };
</script>

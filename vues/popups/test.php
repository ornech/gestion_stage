<?php
echo "La réponse : \"Ceci est la réponse du popup !\" va être transmise dans la console de prof_stage_create";
?>

<br>
<script>
  let response = "<?= $idPopup == 1 ? "Ceci est la réponse du popup !" : "Ceci est une autre réponse car l'id est de " . $idPopup; ?>"
</script>

<button class="button" id="response">Envoyer une réponse</button>

<script>
  document.getElementById("response").addEventListener("click", function() {
    window.opener.postMessage(response, "http://gestage.local/router.php?page=prof_stage_create");
    window.close();
  });
</script>
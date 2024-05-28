<?php
require_once 'config/auth.php';
?>

<button class="button is-primary" id="openPopup" onclick="openPopup('vue_popup_test')">Accedez popup 1</button>
<button class="button is-primary" id="openPopup" onclick="openPopup('vue_popup_Othertest')">Accedez popup 2</button>

<script type="text/javascript">
  function openPopup(route) {
    var popup = window.open("router.php?page=" + route, "_blank", "popup");

    // Attendre la réponse de la popup
    window.addEventListener("message", function(event) {
      if (event.origin === window.location.origin) {
      var response = event.data;
      console.log("Réponse de la popup :", response);
      window.removeEventListener("message", arguments.callee);
      }
    });
  }
</script>

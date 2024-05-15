<?php
require_once 'config/auth.php';
?>

<form>
<INPUT TYPE="button" VALUE="Retour" onClick="history.go(-1);">
</form>
<BR>
<div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">Erreur !</h4>
  <p><?php echo $_GET['message']; ?></p>

</div>

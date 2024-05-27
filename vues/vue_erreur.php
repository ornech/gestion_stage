<?php
require_once 'config/auth.php';
?>

<form>
  <INPUT TYPE="button" VALUE="Retour" onClick="history.go(-1);">
</form>
<BR>
  <div class="notification is-danger is-light">

    <h1 class="title is-1">
      <i class="fa fa-warning" style="font-size:48px;color:red"></i>
        <?= $titre = empty($_GET['titre']) ? "Erreur" : $_GET['titre']  ; ?>
    </h1>
    <HR>
    <p><?php echo $_GET['message']; ?></p>
  </div>

<!-- accueil.php -->
<?php
require_once 'config/auth.php';
?>

<br><br>
<div class="container ">
  <div class="row">
    <div class="col">
      <div class="jumbotron">
        <h2>Envoie d'email</h2>
        <hr class="my-4">
        <p class="lead">Vous avez envoyé un email à une entreprise, enregistrez ici votre démarche.</p>
      </div>
   </div>
   <div class="col">
     <div class="box-shadow">
       <h2>Appel téléphonique</h2>
      <hr class="my-4">
       <p class="lead">Vous avez téléphoné à une entreprise, enregistrez ici votre démarche.</p>

     </div>
  </div>
</div>
<div class="row">
  <div class="col">
    <p class="lead">
      <a class="btn btn-lg btn-block btn-outline-primary" href="router.php?page=activite_create&type=email" role="button"><i class="fa fa-at"></i>&nbsp; Email envoyé</a>
    </p>
  </div>
  <div class="col">
    <p class="lead">
      <a class="btn btn-lg btn-block btn-outline-primary" href="router.php?page=activite_create&type=tel" role="button"><i class="fa fa-phone"></i> &nbsp; Appel passé</a>
    </p>
  </div>
</div>

<BR>

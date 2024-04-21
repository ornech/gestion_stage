<?php
require_once 'config/auth.php';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">GESTION STAGES </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="router.php?page=listerEntreprises"><i class="fa-regular fa-address-card"></i> &nbsp; Entreprises</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://gestage.localhost/router.php?page=gestion_etu"><i class="fas fa-users"></i>&nbsp; Gestion étudiants</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="router.php?page=activite_prof"><i class='far fa-calendar-alt'>&nbsp;</i>Activités</a>
        </li>
      </ul>
    </div>

    <!-- Bouton de déconnexion aligné à droite -->
    Professeur: &nbsp;<b><?php echo $_SESSION['utilisateur'] ?> </b>&nbsp;

    <a href="logout.php" class="btn btn-outline-danger my-2 my-sm-0" type="button">
      <i class="fas fa-sign-out-alt"></i> Déconnexion
    </a>


  </div>
</nav>
<main class="container">

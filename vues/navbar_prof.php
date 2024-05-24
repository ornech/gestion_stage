<?php
require_once 'config/auth.php';
?>
<nav class="navbar is-link" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="#">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28" alt="Logo">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="router.php?page=stage_list"><i class='far fa-calendar-alt'>&nbsp;</i>Stages</a>
        <div class="navbar-dropdown">
          <a class="navbar-item" style="opacity: .20;">Mes suivis</a>
          <a class="navbar-item" href="router.php?page=stage_sio1">SIO1</a>
          <a class="navbar-item" href="router.php?page=stage_sio2">SIO2</a>
        </div>
      </div>


      <a class="navbar-item" href="router.php?page=listerEntreprises"><i class="fa-regular fa-address-card"></i>&nbsp;Entreprises</a>
      <a class="navbar-item" href="router.php?page=recherche"><i class='fa fa-search'>&nbsp;</i>Recherche</a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link"> <i class="fas fa-users"></i>&nbsp; Administration </a>
      <div class="navbar-dropdown">
          <a class="navbar-item" href="router.php?page=create_user">Ajouter utilisateur</a>
          <a class="navbar-item" href="router.php?page=gestion_etu">Gestion utilisateurs</a>
          <a class="navbar-item" href="router.php?page=import_pronote"> Importation pronote</a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Profil
        </a>
        <div class="navbar-dropdown">
          <p class="navbar-item"  style="opacity: .50;">Compte professeur</p>
          <a class="navbar-item" href="router.php?page=profil"> <?php echo $_SESSION['utilisateur'] ?></a>
          <hr class="navbar-divider">
          <a href="logout.php" class="navbar-item" ><i class="fas fa-sign-out-alt"></i>Se déconnecter</a>
        </div>
      </div>
    </div>
  </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', () => {
  // Récupérer tous les éléments "navbar-burger"
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Vérifier s'il y a des burgers
  if ($navbarBurgers.length > 0) {
    // Ajouter un événement de clic sur chacun d'entre eux
    $navbarBurgers.forEach(el => {
      el.addEventListener('click', () => {
        // Récupérer la cible à partir de l'attribut "data-target"
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Basculer les classes "is-active" sur le "navbar-burger" et le "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');
      });
    });
  }
});
</script>


<main class="container">

<?php
require_once 'config/auth.php';
if (isset($operationsModel)) {
  $operations = $operationsModel->list();
  $nb_operations = count($operations);
}

?>
<nav class="navbar is-link" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php">GESTAGE</a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link"><i class='far fa-calendar-alt'>&nbsp;</i>Stages</a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href="router.php?page=stage_consignes"><i class="fa fa-bullhorn"></i> &nbsp; Consignes</a>
          <a class="navbar-item" href="router.php?page=stage_sio1"><i class="fa fa fa-cube"></i> &nbsp; SIO1</a>
          <a class="navbar-item" href="router.php?page=stage_sio2"><i class="fa fa fa-cubes"></i> &nbsp; SIO2</a>
        </div>
      </div>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link"> <i class="fa fa-institution"></i> &nbsp; Entreprises </a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href="router.php?page=recherche"><i class='fa fa-search'></i> &nbsp; Recherche</a>
          <a class="navbar-item" href="router.php?page=listerEntreprises"><i class="fa-regular fa-address-card"></i> &nbsp; Annuaire</a>

          <hr class="navbar-divider">
          <!-- <a class="navbar-item" href="router.php?page=ajouter_entreprise"><i class="fa-regular fa-address-card"></i> &nbsp; Ajout manuellement</a> -->

          <a class="navbar-item" href="router.php?page=import_entreprise"><i class="fa fa-download"></i> &nbsp; Importer entreprise</a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link"> <i class="fa fa-institution"></i> &nbsp; Communication </a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href="router.php?page=comm_entreprise"><i class='fa fa-search'></i> &nbsp; Contacts</a>
        </div>
      </div>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link"> <i class="fas fa-users"></i>&nbsp; Administration </a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href="router.php?page=valider_operation"><i class="fa fa-check"></i> &nbsp; Opérations à valider &nbsp;
            <?php if (isset($nb_operations) && $nb_operations > 0): ?>
              <span class="tag is-success"><?= $nb_operations ?><b></b></span>
            <?php endif ?>
          </a>
          <a class="navbar-item" href="router.php?page=logs"><i class="fa fa-newspaper"></i> &nbsp; Journalisation</a>
          <hr class="navbar-divider">
          <a class="navbar-item" href="router.php?page=prof_stage_create"><i class="fa fa-briefcase"></i> &nbsp; Créer un stage</a>
          <a class="navbar-item" href="router.php?page=gestion_etu"><i class="fa fa-users"></i> &nbsp; Gestion utilisateurs</a>
          <a class="navbar-item" href="router.php?page=gestion_classes"><i class="fa-solid fa-chalkboard-user"></i> &nbsp; Gestion classes</a>
          <hr class="navbar-divider">
          <a class="navbar-item" href="router.php?page=create_user"><i class="fa fa-user-plus"></i> &nbsp; Ajouter utilisateur</a>
          <a class="navbar-item" href="router.php?page=import_pronote"><i class="fa fa-download"></i> &nbsp; Importation CSV pronote</a>
        </div>
      </div>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link"><i class="fa fa-user-circle"></i> &nbsp; Profil </a>
        <div class="navbar-dropdown">
          <p class="navbar-item" style="opacity: .50;">Compte professeur</p>
          <a class="navbar-item" href="router.php?page=profil"> <?php echo $_SESSION['utilisateur'] ?></a>
          <hr class="navbar-divider">
          <a href="logout.php" class="navbar-item"><i class="fas fa-sign-out-alt"></i>&nbsp; Se déconnecter</a>
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

<BR>
<main class="container">
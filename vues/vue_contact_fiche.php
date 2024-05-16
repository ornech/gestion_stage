<?php
require_once 'config/auth.php';
?>
<BR>
<?php
    // Vérifier si les données sont disponibles
    if($ContactFiche) {
      // EmployeID
      // nom
      // prenom
      // email
      // telephone
      // fonction
      // EntrepriseID
      // entreprise
      // UserID
      // Created_User
      // Created_date

?>
<center>
<div class="card w-75">
<div class="card text-center">
  <div class="card-header">
    <h2 class="card-title"><?= $ContactFiche->nom ?> <?= $ContactFiche->prenom ?></h2>
    <p class="card-text"> <a href="../router.php?page=fiche_entreprise&idEntreprise=<?= $ContactFiche->EntrepriseID ?>"><?= $ContactFiche->entreprise ?></a></p>
  </div>
  <div class="card-body">
    <p class="card-text">Fonction: <strong><?= $ContactFiche->fonction ?></strong> </p>
    <p class="card-text">email: <strong><?= $ContactFiche->email ?></strong></p>
    <p class="card-text">telephone:<strong> <?= $ContactFiche->telephone ?></strong></p>
  </div>
  <div class="card-footer text-muted">
    <i>Crée par <a href="../router.php?page=view_profil&id=<?= $ContactFiche->UserID ?>"><?= $ContactFiche->Created_User ?></a> le <?= $ContactFiche->Created_date ?></i>
  </div>
</div>
</div>
</center>

<!--
        <p><strong>EmployeID:</strong> <?= $ContactFiche->EmployeID ?></p>
        <p><strong>nom:</strong> <?= $ContactFiche->nom ?></p>
        <p><strong>prenom:</strong> <?= $ContactFiche->prenom ?></p>
        <p><strong>email:</strong> <?= $ContactFiche->email ?></p>
        <p><strong>telephone:</strong> <?= $ContactFiche->telephone ?></p>
        <p><strong>fonction:</strong> <?= $ContactFiche->fonction ?></p>
        <p><strong>EntrepriseID:</strong> <?= $ContactFiche->EntrepriseID ?></p>
        <p><strong>entreprise:</strong> <?= $ContactFiche->entreprise ?></p>
        <p><strong>UserID:</strong> <?= $ContactFiche->UserID ?></p>
        <p><strong>Created_User:</strong> <?= $ContactFiche->Created_User ?></p>
        <p><strong>Created_date:</strong> <?= $ContactFiche->Created_date ?></p>
-->

<?php
    } else {
        // Si aucune entreprise n'a été trouvée, afficher un message d'erreur
        echo "<p>Aucune donnée disponible</p>";
    }
?>

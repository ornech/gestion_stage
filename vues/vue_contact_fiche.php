<?php
require_once 'config/auth.php';
?>
<BR>
<?php
// Vérifier si les données sont disponibles
  if(($ContactFiche->contact_valide == 1 ) || ($ContactFiche->contact_valide == 0 && $_SESSION["statut"]=="Professeur")){
?>
<p class="title is-1">Contact</p>
<p class="subtitle is-2"><?= $ContactFiche->nom ?> <?= $ContactFiche->prenom ?></p>

<div class="table-container">
  <table class="table is-striped is-fullwidth ">
    <tbody>
      <tr>
        <th style="width:20%;"><p style="text-align: right;">Poste occupé</p></th>
        <td><?= $ContactFiche->fonction ?></td>
      </tr>
      <tr>
        <th style="width:20%;"><p style="text-align: right;">Service</p></th>
        <td><?= $ContactFiche->service ?></td>
      </tr>
      <tr>
        <th style="width:20%;"><p style="text-align: right;">Mail professionel</p></th>
        <td><?= $ContactFiche->email ?></td>
      </tr>
      <tr>
        <th style="width:20%;"><p style="text-align: right;">Téléphone professionel</p></th>
        <td><?= $ContactFiche->telephone ?></td>
      </tr>
      <tr>
        <th style="width:20%;"><p style="text-align: right;">Entreprise</p></th>
        <td><a href="../router.php?page=fiche_entreprise&idEntreprise=<?= $ContactFiche->EntrepriseID ?>"><?= $ContactFiche->entreprise ?></a></td>
      </tr>
      <tr>
        <th style="width:20%;"><p style="text-align: right;">Adresse</p></th>
        <td><?= $ContactFiche->Entreprise_adresse ?><BR>
            <?= $ContactFiche->Entreprise_codePostal ?> <?= $ContactFiche->Entreprise_ville ?>
        </td>
      </tr>
    </tbody>
  </table>
  <?php
  //seul le créateur du contact ou un professeur peut modifier le contact
  if($ContactFiche->UserID === $_SESSION["userID"] || $_SESSION["statut"]=="Professeur" ):?>
    <a href="router.php?page=contact_update&idContact=<?= $ContactFiche->EmployeID ?>" class="card-footer-item"><div class="button is-link">Modifier</div></a>
  <?php endif;?>
</div>
<center>
  <small>Crée par <?= $ContactFiche->Created_User ?> le <?= $ContactFiche->Created_date ?></small>
</center>


<?php
  } else {
  // Si aucune entreprise n'a été trouvée, afficher un message d'erreur
  echo "<p>Aucune donnée disponible</p>";
  }
?>

<?php
require_once 'config/auth.php';
?>
<BR>
  <?php
  // Vérifier si les données sont disponibles
  if($contacts) {
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

    //var_dump($contacts);

    ?>

    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Nom </th>
          <th>Prénom</th>
          <th>Téléphone</th>
          <th>Mail </th>
          <th>Fonction</th>
          <th></td>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($contacts as $contact): ?>
            <tr>
              <td><?= $contact->nom ? $contact->nom : "Non défini" ?></td>
              <td><?= $contact->prenom ? $contact->prenom : "Non défini" ?></td>
              <td><?= $contact->telephone ? $contact->telephone : "Non défini" ?></td>
              <td><?= $contact->email ? $contact->email : "Non défini" ?></td>
              <td><?= $contact->fonction ? $contact->fonction : "Non défini" ?></td>
              <td>
                <a href="../router.php?page=Contact_fiche&idContact=<?= $contact->EmployeID ?>">voir</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
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

         <a href='router.php?page=contact_create&idEntreprise=<?= $_GET["idEntreprise"] ?>'>
            <button type='button' class='btn btn-primary'>Ajouter un contact</button>
         </a>

        <?php
      } else if(isset($_GET["idEntreprise"]) && $ficheEntreprise) {
        // Si aucune entreprise n'a été trouvée, afficher un message d'erreur
        echo "<p>Aucun contact pour cette entreprise</p>";

        ?>
         <a href='router.php?page=contact_create&idEntreprise=<?= $_GET["idEntreprise"] ?>'>
            <button type='button' class='btn btn-primary'>Ajouter un contact</button>
         </a>
         <?php

      }

?>

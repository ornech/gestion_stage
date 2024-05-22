<?php
require_once 'config/auth.php';
?>
<BR>
  <?php
  // Vérifier si les données sont disponibles
  if($Stages) {
    // Données
    // `s`.`id` AS `idStage`,
    // `s`.`idEntreprise` AS `idEntreprise`,
    // `s`.`idMaitreDeStage` AS `idMaitreDeStage`,
    // `s`.`idEtudiant` AS `idEtudiant`,
    // `s`.`titreStage` AS `titreStage`,
    // `s`.`description` AS `description`,
    // `s`.`dateDebut` AS `dateDebut`,
    // `s`.`dateFin` AS `dateFin`,
    // `u`.`nom` AS EtudiantNom,
    // `u`.`prenom` AS EtudiantPrenom,
    // `u`.`email` AS EtudiantEmail,
    // `u`.`spe` AS EtudiantSpe,
    // `u`.`promo` AS EtudiantPromo,
    // `e`.`siret` AS `siret`,
    // `e`.`nomEntreprise` AS `Entreprise`

    ?>

    <table class="table">
      <thead>
        <tr>
          <th>Etudiant </th>
          <th>Promotion</th>
          <th>Entreprise</th>
          <th>Maitre de stage</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($Stages as $Stage): ?>
            <tr>
              <td><a href="../router.php?page=view_profil&id=<?= $Stage->idEtudiant ?>"><?= $Stage->EtudiantNom  ?> <?= $Stage->EtudiantPrenom ?> </a></td>
              <td><?= $Stage->EtudiantPromo ? $Stage->EtudiantPromo : "Non défini" ?></td>
              <td><a href="../router.php?page=fiche_entreprise&idEntreprise=<?= $Stage->idEntreprise ?>"><?= $Stage->Entreprise ?></td>
              <td>
                <a href="../router.php?page=Contact_fiche&idContact=<?= $Stage->idMaitreDeStage ?>"><?= $Stage->idMaitreDeStage ?></a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>


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

<?php
require_once 'config/auth.php';
?>
<BR>
  <?php
  // Vérifier si les données sont disponibles
  if($profils) {
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

    <table class="table is-fullwidth tableFilter" id="maTable">
      <thead>
        <tr>
          <th class="lineFilter" name="Etudiant"></th>
          <th class="lineFilter" name=""></th>
          <th class="lineFilter" name=""></th>
          <th class="lineFilter" name=""></th>
          <th class="lineFilter" name=""></th>
          <th class="lineFilter" name=""></td>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($profils as $profil): 
            $profilStage = $stageModel->readFromEtudiantId($profil->id);
            var_dump($profilStage)
          ?>
            <tr <?= isset($profilStage[0]) ? "" : "class=\"is-danger is-light\""?>>
              <th><a href="../router.php?page=view_profil&id=<?= $profil->id ?>"><?= $profil->nom  ?> <?= $profil->prenom ?></a></th>
              <td><?= $profil->classe ? $profil->classe : "Non défini" ?></td>
              <td><?= "Non défini" ?></td>
              <td><?= "Non défini" ?></td>
              <td><a href="../router.php?page=fiche_entreprise&idEntreprise=<?= "" ?>"><?= "" ?></td>
              <td>
                <a href="../router.php?page=Contact_fiche&idContact=<?= "" ?>"><?= "" . " " . "" ?></a></td>
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

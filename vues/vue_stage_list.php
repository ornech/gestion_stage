<?php
require_once 'config/auth.php';
?>
<BR>
<?php
// Vérifier si les données sont disponibles
if ($profils) {
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

  <table class="table is-fullwidth is-fluid tableFilter" id="maTable">
    <thead>
      <tr>
        <th class="lineFilter" name="Étudiant"></th>
        <th class="lineFilter" name="Classe"></th>
        <th class="lineFilter" name="Début du stage"></th>
        <th class="lineFilter" name="Fin du stage"></th>
        <th class="lineFilter" name="Professeur assigné"></th>
        <th class="lineFilter" name="Éditer convention"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($profils as $profil) :
        $profilStage = array_filter($stageModel->readFromEtudiantId($profil->id), function ($stages) use ($stage) {
          return $stages->classe == $stage;
        }); ?>

        <tr>
          <th>
            <a href="../router.php?page=view_profil&id=<?= $profil->id ?>">

              <?php if (!isset($profilStage[0])) : ?>
                <i class="fa-solid fa-x" style="color: hsl(0 100% 50%);"></i>
              <?php elseif (isset($profilStage[0])) :
                $profilStage = $profilStage[0];  ?>
                <i class="fa-solid fa-check" style="color: hsl(120 100% 25%);"></i>
              <?php endif; ?>

              <?php echo "$profil->nom  $profil->prenom"; ?>
            </a>
          </th> <!-- Nom de l'étudiant -->

          <td><?= isset($profil->classe) ? $profil->classe : "-" ?></td> <!-- Classe de l'étudiant -->
          <td><?= isset($profilStage->dateDebut) ? $profilStage->dateDebut : "-" ?></td> <!-- Date de début du stage -->
          <td><?= isset($profilStage->dateFin) ? $profilStage->dateFin : "-" ?></td> <!-- Date de fin du stage -->
          <td>
            <?php
            if(isset($profilStage->idProfesseur)){
              $professeur = $profilModel->read_profil($profilStage->idProfesseur);
              echo $professeur->nom . " " . $professeur->prenom;
            }else{echo "-";}
            ?>
          </td><!-- Professeur assigné -->
          <td>-</td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>


<?php
} else if (isset($_GET["idEntreprise"]) && $ficheEntreprise) {
  // Si aucune entreprise n'a été trouvée, afficher un message d'erreur
  echo "<p>Aucun contact pour cette entreprise</p>";

?>
  <a href='router.php?page=contact_create&idEntreprise=<?= $_GET["idEntreprise"] ?>'>
    <button type='button' class='btn btn-primary'>Ajouter un contact</button>
  </a>
<?php

}

?>

<style>
  tr.is-danger td,
  tr.is-danger th {
    background-color: #ff003373;
  }
</style>
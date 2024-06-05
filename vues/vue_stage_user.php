<?php
require_once 'config/auth.php';

//ajouter session id =:id
if ($_GET["page"] == "stage_read" || $_GET["page"] == "stage") {

// Vérifier si les détails du profil sont disponibles
  $stage = $stage["0"];
  if (isset($stage)) {
    if (isset($Profil)) {

      if (($_SESSION['statut'] == "Professeur") || ($_SESSION['statut'] == "Etudiant")&& $idUser == $_SESSION["userID"]){
?>

<!-- --------------- DEBUT ANCIENNE VUE ----------------------  -->

<?php
setlocale(LC_TIME, 'fr_FR.UTF-8');  //pour l'affichange de mois en francais
$fmt = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE, 'Europe/Paris', IntlDateFormatter::GREGORIAN);

$dateDebut = new DateTime($stage->dateDebut);
$dateFin = new DateTime($stage->dateFin);
$difference = $dateDebut->diff($dateFin); // (dateFin - dateDebut) -> difference en jour
$semaines = floor($difference->days / 7); // difference en jour divisé sur 7
$debutFormat = $fmt->format($dateDebut); //affichage les mois en lettre
$finFormat = $fmt->format($dateFin);
$professeurs = $profilModel->list_by_professeur();

?>
<!-- --------------- DEBUT NOUVELLE VUE ----------------------  -->


<div class="columns">
  <div class="column">
    <p class="title is-1">Stage <?= $stage->classe ?></p>
    <p class="subtitle is-3"><?= $stage->EtudiantNom ?> <?= $stage->EtudiantPrenom ?></p>
  </div>
  <div class="column is-narrow">
    <div class="buttons are-small is-flex-direction-column">
      <div>
        <button class="button is-medium" onclick="window.open('router.php?page=stage_convention&idStage=<?= $stage->idStage ?>')">Récupérer la convention</button>
      </div>
      <div>
        <button class="button is-medium" onclick="window.open('router.php?page=stage_edit&idStage=<?= $stage->idStage ?>')">Modifier les détails</button>
      </div>
    </div>
  </div>
</div>

 <HR>
<div class="box">
  <p class="card-header-title" style="text-align: left;"> Nom de l'étudiant: &nbsp;<a href='../router.php?page=view_profil&id=<?=$stage->idEtudiant ?>'><?= $stage->EtudiantNom . " " . $stage->EtudiantPrenom ?></a></p>
  <p>Entreprise: <a href="../router.php?page=fiche_entreprise&idEntreprise=<?= $stage->idEntreprise ?>"><?= $stage->Entreprise ?></a></p>
  <p>Position: A MODIFIER </p>
  <p>Durée de stage: <strong><?= $semaines ?> semaines (<?= $debutFormat . " - " . $finFormat ?> )</strong></p>
  <div style="display: flex; align-items: center;">
    <p class="card-text" style="margin-right: 10px;">Professeur assigné: </p>
    <?php if ($_SESSION['statut'] == "Professeur") : ?>
      <form method="post" action="">
        <input type="hidden" name="Stage" class="stageId" value="<?= isset($stage->idStage) ? $stage->idStage : "" ?>">

        <div class="select is-small">
          <select name="Professeur">
            <?php if (isset($stage->idProfesseur)) : ?>
              <?php foreach ($professeurs as $professeur) : ?>
                <option value="<?= $professeur->id ?>" <?= isset($stage->idProfesseur) && $stage->idProfesseur == $professeur->id ? "selected" : "" ?>>
                  <?= "$professeur->nom $professeur->prenom" ?>
                </option>
              <?php endforeach; ?>
            <?php else : ?>
              <option value="">Aucun professeur assigné</option>
              <?php foreach ($professeurs as $professeur) : ?>
                <option value="<?= $professeur->id ?>">
                  <?= "$professeur->nom $professeur->prenom" ?>
                </option>
              <?php endforeach; ?>
            <?php endif; ?>
          </select>
          </div>
      </form>
    <?php else : ?>
      <?php foreach ($professeurs as $professeur){
      if (isset($stage->idProfesseur) && $stage->idProfesseur == $professeur->id){
            ?>
                 <p> <?= "$professeur->nom $professeur->prenom" ?> </p>


    <?php        }
      }
       ?>
  <?= "$professeur->nom $professeur->prenom" ?>
    <?php endif; ?>
  </div>



<HR>
<p class="card-text">Maître de stage: <strong><a href="../router.php?page=Contact_fiche&idContact=<?=$stage->idMaitreDeStage ?>"><?= $stage->employe_nom . " " . $stage->employe_prenom ?></a></strong> </p>
<p class="card-text">Fonction: <strong><?= $stage->employe_fonction ?></strong> </p>
<p class="card-text">Mail: <strong><?= $stage->employe_mail ?></strong> </p>
<p class="card-text">Téléphone: <strong><?= $stage->employe_telephone ?></strong> </p>

<HR>
<p>Description:</p>
<p><?= $stage->description ?></p>
</div>


<script>
  document.querySelectorAll('div.changeProf').forEach(function(div) {
    var select = div.querySelector('select');
    select.addEventListener('change', function() {
      if (div.querySelector('.stageId').value !== "") {
        this.form.submit();
      }
    });
  });
</script>

<td style="vertical-align: middle;"><?php if (isset($profilStage->idStage)) : ?><button class="button is-small" onclick="window.open('router.php?page=stage_convention&idStage=<?= $profilStage->idStage ?>')">Récupérer</button><?php endif; ?></td>
<td style="vertical-align: middle;"><?php if (isset($profilStage)) : ?><button class="button is-small is-primary" onclick="window.open('router.php?page=stage_edit&idStage=<?= $profilStage->idStage ?>')">Modifier</button><?php endif; ?></td>
<!-- --------------- FIN NOUVELLE VUE ----------------------  -->


  <?php
    }
  } else {
    // Si aucun profil n'a été trouvée, afficher un message d'erreur
    echo "<p>Aucun profil trouvé avec ce lien.</p>";
  }
} else {
  header("Location: ../router.php?page=profil");
}} //Fin de la vérification de si l'utilisateur est connecté en tant que prof
//
  ?>

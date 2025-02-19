<?php
require_once 'config/auth.php';

//ajouter session id =:id
if ($_GET["page"] == "stage_read" || $_GET["page"] == "stage") {

  // Vérifier si les détails du profil sont disponibles
  $stage = $stage["0"];
  if (isset($stage)) {
    if (isset($Profil)) {

      if (($_SESSION['statut'] == "Professeur") || ($_SESSION['statut'] == "Etudiant") && $stage->idEtudiant == $_SESSION["userID"]) {
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
        <p class="title is-1">Stage <?= $stage->classe ?></p>
        <p class="subtitle is-3">
          <?php if($_SESSION['statut'] == "Professeur") : ?>
            <a href="../router.php?page=view_profil&id=<?= $stage->idEtudiant ?>"><?= $stage->EtudiantNom ?> <?= $stage->EtudiantPrenom ?></a>
          <?php else : ?>
          <a href='../router.php?page=profil'><?= $stage->EtudiantNom ?> <?= $stage->EtudiantPrenom ?></a>
          <?php endif; ?>
        </p>
        <div style="display: flex; align-items: center;">
          <p class="card-text" style="margin-right: 10px;">Professeur assigné: </p>
          <?php if ($_SESSION['statut'] == "Professeur"): ?>
            <form method="POST" action="">
              <input type="hidden" name="stageId" class="stageId" value="<?= isset($stage->idStage) ? $stage->idStage : "" ?>">

              <div class="select is-small">
                <select name="Professeur" onchange="this.form.submit()">
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
              <?php
              if (isset($_POST["stageId"]) && isset($_POST["Professeur"])) {
                $stageId = $_POST["stageId"];
                $Professeur = $_POST["Professeur"];
                $sql = "UPDATE stage SET idProfesseur = :Professeur WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $stageId);
                $stmt->bindParam(":Professeur", $Professeur);
                $stmt->execute();
                echo "<script type='text/javascript'>window.location.href = window.location.href;</script>";
                exit;
              }
              ?>
            </form>
          <?php else : ?>
            <?php foreach ($professeurs as $professeur):
              if (isset($stage->idProfesseur) && $stage->idProfesseur == $professeur->id):?>
                <p> <?= "$professeur->nom $professeur->prenom" ?> </p>
            <?php endif;
            endforeach;?>
          <?php endif; ?>
        </div>
        <div class="fixed-grid">
          <div class="grid">
            <div class="cell">
              <div class="box">
                <p><strong>Durée de stage: </strong><?= $semaines ?> semaines (<?= $debutFormat . " - " . $finFormat ?> )</p>
                <p><strong>Entreprise: </strong><a href="../router.php?page=fiche_entreprise&idEntreprise=<?= $stage->idEntreprise ?>"><?= $stage->Entreprise ?></a></p>
                <p><strong>Adresse: </strong><?= $stage->Entreprise_adresse ?>, <?= $stage->Entreprise_codePostal ?> <?= $stage->Entreprise_ville ?></p>
                <p><strong>Secteur: </strong><?= $stage->Entreprise_naf ?></p>

              </div>
            </div>
            <div class="cell">
              <div class="box">
                <p class="card-text"><strong>Maître de stage: </strong><a href="../router.php?page=Contact_fiche&idContact=<?= $stage->idMaitreDeStage ?>"><?= $stage->employe_nom . " " . $stage->employe_prenom ?></a></strong> </p>
                <p class="card-text"><strong>Fonction: </strong><?= $stage->employe_fonction ?></p>
                <p class="card-text"><strong>Mail: </strong><?= $stage->employe_mail ?></p>
                <p class="card-text"><strong>Téléphone: </strong><?= $stage->employe_telephone ?> </p>
              </div>
            </div>
          </div>
        </div>


        <div class="box">
          <p>Description: &nbsp;
            <button id="openModal" for="modalDesc" class="button is-small">
              <span class="icon">
                <i class="fas fa-pencil-alt"></i>
              </span>
            </button>
          </p>
          <p><?= $stage->description ?></p>
        </div>

        <div class="column is-narrow">
          <button class="button is-medium" onclick="window.open('router.php?page=stage_convention&idStage=<?= $stage->idStage ?>')">Récupérer la convention</button>
          <button class="button is-medium" onclick="window.open('router.php?page=stage_edit&idStage=<?= $stage->idStage ?>')">Modifier les détails</button>
        </div>
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

        <div class="modal" id="modalDesc">
          <div class="modal-background"></div>
          <div class="modal-card">
            <header class="modal-card-head">
              <p class="modal-card-title"> Ajoutez ou modifiez la note</p>
              <button class="delete cancel" id="closeModal" for="modalDesc" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
              <form id="DescForm" method="post">
                <div class="is-grouped">
                  <input type="hidden" name="id" value="<?= $stage->idStage ?>">
                  <label for="Desc">Notes:</label>
                  <textarea class="textarea" id="Desc" name="Desc"><?PHP
                   $sql = "SELECT description FROM stage WHERE id = $stage->idStage";
                   $stmt = $conn->prepare($sql);
                   $stmt->execute();
                   $result = $stmt->fetch();
                   echo $result["description"];
                   ?></textarea>
                </div>
                <?php
                if (isset($_POST["id"]) && isset($_POST["Desc"])) {
                  $stageId = $_POST["id"];
                  $Desc = $_POST["Desc"];
                  $sql = "UPDATE stage SET description = :description WHERE id = :id";
                  $stmt = $conn->prepare($sql);
                  $stmt->bindParam(":id", $stageId);
                  $stmt->bindParam(":description", $Desc);
                  $stmt->execute();
                  echo "<script type='text/javascript'>window.location.href = window.location.href;</script>";
                  exit;
                }
                ?>
              </form>
            </section>
            <footer class="modal-card-foot">
              <div class="buttons">
                <button class="button is-success" id="saveDesc">Enregistrer</button>
                <button class="button" id="closeModal" for="modalDesc">Annuler</button>
              </div>
            </footer>
          </div>
        </div>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('openModal').addEventListener('click', function() {
              document.getElementById('modalDesc').classList.add('is-active');
            });
            document.getElementById('closeModal').addEventListener('click', function() {
              document.getElementById('modalDesc').classList.remove('is-active');
            });
            document.getElementById('saveDesc').addEventListener('click', function() {
              document.getElementById('DescForm').submit();
            });
          });
        </script>

<?php
      }
    } else {
      // Si aucun profil n'a été trouvée, afficher un message d'erreur
      echo "<p>Aucun profil trouvé avec ce lien.</p>";
    }
  } else {
    header("Location: ../router.php?page=profil");
  }
} //Fin de la vérification de si l'utilisateur est connecté en tant que prof
//
?>
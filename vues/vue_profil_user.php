<?php
require_once 'config/auth.php';

if (($_GET["page"] == "view_profil" && $_SESSION['statut'] == "Professeur") || $_GET["page"] == "profil") {

  // Vérifier si les détails du profil sont disponibles
  if ($Profil) {
    // Afficher les détails du profil
    $userPoints = $profilModel->getPointByUser($Profil->id);
    $tuteurs = $profilModel->list_by_professeur();
    $table_name = 'user';
    $id = $Profil->id;
    
    $ppName = $classe != false ? $classe->nomProf : "Aucun";

    if (isset($userPoints->points)) {
      $userPoints = $userPoints->points;
    } else {
      $userPoints = 0;
    }
    ?>

    <style>
      .blue-line-bottom {
        border-bottom: 2px solid #00d1b2;
      }
      .orange-line-bottom {
        border-bottom: 2px solid orange;
      }
      .unselectable {
        -webkit-user-select: none; /* Chrome all / Safari all */
        -moz-user-select: none;    /* Firefox all */
        -ms-user-select: none;     /* IE 10+ */
        user-select: none;         /* Likely future */
        cursor: default;           /* Non-essential, but cursor should not change when selecting text */
      }
    </style>

    <div class="container">
      <div class="columns">
        <div class="column">
          <div class="box">
            <div class="content">
              <h3 class="title is-4 has-text-centered blue-line-bottom mb-4"><?= $Profil->nom ?> <?= $Profil->prenom ?></h3>
              <table class="table is-fullwidth">
                <tr><th>Statut</th><td><?= $Profil->statut ? $Profil->statut : '<span class="icon"><i class="fas fa-magnifying-glass-minus"></i></span>' ?></td><td></td></tr>
                <tr><th>Login</th><td><?= $Profil->login ? $Profil->login : '<span class="icon"><i class="fas fa-magnifying-glass-minus"></i></span>' ?></td><td></td></tr>
                <tr><th>Mail</th><td><?= $Profil->email ? $Profil->email : '<span class="icon"><i class="fas fa-magnifying-glass-minus"></i></span>' ?></td><td><!-- Classe -->
                  <?php if ($_SESSION['statut'] == "Professeur") { ?>
                    <button id="openModal" for="modalMail" class="button is-small">
                      <span class="icon">
                        <i class="fas fa-pencil-alt"></i>
                      </span>
                    </button>
                  <?php } ?>
                </td>
                </tr>
                <tr><th>Téléphone</th><td><?= $Profil->telephone ? $Profil->telephone : '<span class="icon"><i class="fas fa-magnifying-glass-minus"></i></span>' ?></td><td><!-- Classe -->
                  <?php if ($_SESSION['statut'] == "Professeur") { ?>
                    <button id="openModal" for="modalPhone" class="button is-small">
                      <span class="icon">
                        <i class="fas fa-pencil-alt"></i>
                      </span>
                    </button>
                  <?php } ?>
                </td>
                </tr>


                <!-- ------------------------------------------QUE POUR LES PROFILS DES ETUDIANTS-----------------------------  -->
                <?php if ($Profil->statut == 'Etudiant') { ?> <!-- Statut-->

                  <tr><th>Classe</th><td><?= $Profil->classe ?></td><td><!-- Classe -->
                    <?php if ($_SESSION['statut'] == "Professeur") { ?>
                      <button id="openModal" for="modalClasse" class="button is-small">
                        <span class="icon">
                          <i class="fas fa-pencil-alt"></i>
                        </span>
                      </button>
                    <?php } ?>
                  </td></tr>

                  <tr><th>Spécialité</th><td><?= $Profil->spe ? $Profil->spe : '-' ?><!-- Spécialité -->
                  </td><td>
                    <?php if ($_SESSION['statut'] == "Professeur") { ?>
                      <button id="openModal" for="modalSpe" class="button is-small">
                        <span class="icon">
                          <i class="fas fa-pencil-alt"></i>
                        </span>
                      </button>
                    <?php } ?>
                  </td></tr>
                  <tr><th>Promotion</th><td><?= $Profil->promo ? $Profil->promo : '-' ?></td><td></td></tr><!-- Promotion -->
                  <tr><th>Professeur principal</th><td><?= $ppName ?></td><td></td></tr><!-- Professeur principal -->
                  <tr><th>Tuteur</th><td><!-- Tuteur -->
                    <?php
                    if (isset($Profil->idTuteur)) {
                      foreach ($tuteurs as $tuteur) {
                        if ($Profil->idTuteur == $tuteur->id) {
                          echo "$tuteur->nom $tuteur->prenom";
                        }
                      }
                    } else {
                      echo '-';
                    }
                    ?>
                    </td><td>
                    <?php if ($_SESSION['statut'] == "Professeur") { ?>
                      <button id="openModal" for="modalTuteur" class="button is-small">
                        <span class="icon">
                          <i class="fas fa-pencil-alt"></i>
                        </span>
                      </button>
                    <?php } ?>
                  </td></tr>
                <?php } ?>
              </table>

              <p class="card-text">Points d'activité obtenus : <strong><?= $userPoints ?></strong></p>
              <?php if ($_SESSION['statut'] == "Professeur" && $Profil->statut != "Professeur") { ?>
                <button class="button is-danger mt-4" id="openModal" for="modalDelete">Supprimer &nbsp;<span class="icon"><i class="fas fa-trash-alt"></i></span></button>
              <?php } ?>
            </div>
          </div>
        </div>

        <?php
        // ------------------------------------LA PARTIE DE BOX DE STAGE--------------------------------------
        if ($Profil->statut == 'Etudiant') {
          ?>
          <div class="column is-two-thirds">
            <div class="box">
              <div style="display: flex; flex-direction: column; height: 100%;">
                <h3 class="title is-4 has-text-centered orange-line-bottom">Stages effectués</h3>
                <?php if (isset($stages[0])) {
                  foreach ($stages as $stage) { ?>
                    <table class="table table-striped table-hover tableFilter" id="maTable">
                      <thead>
                        <tr>
                          <th>Entreprise</th>
                          <th>Classe</th>
                          <th>Date début</th>
                          <th>Date fin</th>
                          <th>Maître de stage</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><a href="../router.php?page=fiche_entreprise&idEntreprise=<?= $stage->idEntreprise ?>"><?= $stage->Entreprise ?></a></td>
                          <td><?= $stage->classe ? $stage->classe : "-" ?></td>
                          <td><?= $stage->dateDebut ? $stage->dateDebut : "-" ?></td>
                          <td><?= $stage->dateFin ? $stage->dateFin : "-" ?></td>
                          <td><a href="../router.php?page=Contact_fiche&idContact=<?= $stage->idMaitreDeStage ?>"><?= $stage->employe_nom . " " . $stage->employe_prenom ?></a></td>
                        </tr>
                      </tbody>
                    </table>
                  <?php }
                } else {
                  echo "<br>L'étudiant n'a pas effectué de stage.";
                } ?>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

    <!-- Modals -->
    <?php if ($_SESSION['statut'] == "Professeur" && $Profil->statut != "Professeur") { ?>

      <div class="modal" id="modalSpe">
        <div class="modal-background"></div>
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Modification de spécialité</p>
            <button class="delete cancel" id="closeModal" for="modalSpe" aria-label="close"></button>
          </header>
          <section class="modal-card-body">
            <form id="speForm" method="post">
              <div class="is-grouped">
                Spécialité:
                <input type="hidden" name="id" value="<?= $Profil->id ?>">
                <div class="select is-small">
                  <select name="spe">
                    <option value="SLAM" <?= $Profil->spe == "SLAM" ? "selected" : "" ?>>SLAM</option>
                    <option value="SISR" <?= $Profil->spe == "SISR" ? "selected" : "" ?>>SISR</option>
                    <option value="" <?= empty($Profil->spe) ? "selected" : "" ?>>Pas de spécialité</option>
                  </select>
                </div>
              </div>
            </form>
            <?php
            if (isset($_POST["id"]) && isset($_POST["spe"])) {
              $profilId = $_POST["id"];
              $spe = $_POST["spe"];
              $sql = "UPDATE $table_name SET spe = :spe WHERE id = :id";
              $stmt = $conn->prepare($sql);
              $stmt->bindParam(":id", $profilId);
              $stmt->bindParam(":spe", $spe);
              $stmt->execute();
              echo "<script type='text/javascript'>window.location.href = window.location.href;</script>";
              exit;
            }
            ?>
          </section>
          <footer class="modal-card-foot">
            <div class="buttons">
              <button class="button is-success" id="saveSpe">Enregistrer</button>
              <button class="button" id="closeModal" for="modalSpe">Annuler</button>
            </div>
          </footer>
        </div>
      </div>

      <div class="modal" id="modalDelete">
        <div class="modal-background"></div>
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Suppression de l'utilisateur</p>
            <button class="delete cancel" id="closeModal" for="modalDelete" aria-label="close"></button>
          </header>
          <section class="modal-card-body unselectable">
            <div class="content">
              <p>La suppression de ce compte entraînera l'anonymisation des données personnelles de l'utilisateur :</p>
              <ul>
                <li>Nom et prénom</li>
                <li>Téléphone et adresse e-mail</li>
                <li>Classe, date d'entrée, promotion et spécialité</li>
              </ul>
              <p>L'utilisateur perdra également l'accès à son compte et à toutes ses fonctionnalités associées.</p>
              <p>Veuillez confirmer votre choix en écrivant son nom et prénom :<br>
                <b><?= $Profil->nom ?> <?= $Profil->prenom ?></b></p>
              <input type="text" id="confirmName" class="input" placeholder="Nom et prénom" required>
              <p>Une fois cette action réalisée, vous ne pourrez plus revenir en arrière !</p>
            </div>
          </section>
          <footer class="modal-card-foot">
            <div class="buttons">
              <button class="button cancel" id="closeModal" for="modalDelete">Annuler</button>
              <button class="button is-danger" id="accept" disabled>Confirmer la suppression</button>
            </div>
          </footer>
        </div>
      </div>

      <div class="modal" id="modalTuteur">
        <div class="modal-background"></div>
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Modification de tuteur</p>
            <button class="delete cancel" id="closeModal" for="modalTuteur" aria-label="close"></button>
          </header>
          <section class="modal-card-body">
            <p class="card-text">Tuteur actuel:
              <?php
              if (isset($Profil->idTuteur)) {
                foreach ($tuteurs as $tuteur) {
                  if ($Profil->idTuteur == $tuteur->id) {
                    echo "$tuteur->nom $tuteur->prenom";
                  }
                }
              } else {
                echo '-';
              }
              ?>
            </p>
            <form id="tuteurForm" method="post">
              <div class="is-grouped">
                Nouveau tuteur:
                <input type="hidden" name="id" value="<?= $Profil->id ?>">
                <div class="select is-small">
                  <select name="idTuteur">
                    <option value="">Aucun professeur assigné</option>
                    <?php foreach ($tuteurs as $tuteur) { ?>
                      <option value="<?= $tuteur->id ?>" <?= $Profil->idTuteur == $tuteur->id ? "selected" : "" ?>>
                        <?= "$tuteur->nom $tuteur->prenom" ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </form>
            <?php
            if (isset($_POST["id"]) && isset($_POST["idTuteur"])) {
              $profilId = $_POST["id"];
              $idTuteur = $_POST["idTuteur"];
              $sql = "UPDATE $table_name SET idTuteur = :idTuteur WHERE id = :id";
              $stmt = $conn->prepare($sql);
              $stmt->bindParam(":id", $profilId);
              $stmt->bindParam(":idTuteur", $idTuteur);
              $stmt->execute();
              echo "<script type='text/javascript'>window.location.href = window.location.href;</script>";
              exit;
            }
            ?>
          </section>
          <footer class="modal-card-foot">
            <div class="buttons">
              <button class="button is-success" id="saveTuteur">Enregistrer</button>
              <button class="button" id="closeModal" for="modalTuteur">Annuler</button>
            </div>
          </footer>
        </div>
      </div>

      <div class="modal" id="modalClasse">
        <div class="modal-background"></div>
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Modification de la classe</p>
            <button class="delete cancel" id="closeModal" for="modalClasse" aria-label="close"></button>
          </header>
          <section class="modal-card-body">
            <form id="classeForm" action="../controller/profil_update_classe.php" method="post">
              <div class="is-grouped">
                <p class="is-size-5" style="display: inline;">Choississez une classe :</p>
                <input type="hidden" name="id" value="<?= $Profil->id ?>">
                <div class="select is-small">
                  <select name="classe">
                    <option value="SIO1" <?= $Profil->classe == "SIO1" ? "selected" : "" ?>>SIO1</option>
                    <option value="SIO2" <?= $Profil->classe == "SIO2" ? "selected" : "" ?>>SIO2</option>
                  </select>
                </div>
              </div>
            </form>
          </section>
          <footer class="modal-card-foot">
            <div class="buttons">
              <button class="button is-success" id="saveClasse">Enregistrer</button>
              <button class="button" id="closeModal" for="modalClasse">Annuler</button>
            </div>
          </footer>
        </div>
      </div>

      <script>
        document.getElementById("accept").addEventListener("click", function() {
          var form = document.createElement("form");
          form.method = "post";
          form.action = "../controller/delete_user.php";

          var input = document.createElement("input");
          input.type = "hidden";
          input.name = "userId";
          input.value = <?= $Profil->id ?>;

          form.appendChild(input);
          document.body.appendChild(form);
          form.submit();
        });

        document.getElementById("confirmName").addEventListener("input", function() {
          var confirmName = this.value.trim();
          var acceptButton = document.getElementById("accept");

          if (confirmName === "<?= $Profil->nom ?> <?= $Profil->prenom ?>") {
            acceptButton.disabled = false;
          } else {
            acceptButton.disabled = true;
          }
        });

        document.getElementById('saveTuteur').addEventListener('click', function() {
          document.getElementById('tuteurForm').submit();
        });

        document.getElementById('saveClasse').addEventListener('click', function() {
          document.getElementById('classeForm').submit();
        });

        document.getElementById('saveSpe').addEventListener('click', function() {
          document.getElementById('speForm').submit();
        });
      </script>

    <?php }
  } else {
    header("Location: ../router.php?page=profil");
  }
  // Fin de la vérification de si l'utilisateur est connecté en tant que prof
}
?>

<div class="modal" id="modalMail">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Modification de l'email</p>
      <button class="delete cancel" id="closeModal" for="modalMail" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <form id="mailForm" action="../controller/profil_update_mail.php" method="post">
        <div class="is-grouped">
          <p class="is-size-5" style="display: inline;">Entrez votre adresse mail :</p>
          <input type="hidden" name="id" value="<?= $Profil->id ?>">
          <input type="email" class="input" name="mail" value="<?= $Profil->email ?>" required>
        </div>
      </form>
    </section>
    <footer class="modal-card-foot">
      <div class="buttons">
        <button class="button is-success" id="saveMail">Enregistrer</button>
        <button class="button" id="closeModal" for="modalMail">Annuler</button>
      </div>
    </footer>
  </div>
</div>

<div class="modal" id="modalPhone">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Modification du téléphone</p>
      <button class="delete cancel" id="closeModal" for="modalPhone" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <form id="phoneForm" action="../controller/profil_update_phone.php" method="post">
        <div class="is-grouped">
          <p class="is-size-5" style="display: inline;">Entrez votre numéro de téléphone :</p>
          <input type="hidden" name="id" value="<?= $Profil->id ?>">
          <input type="tel" class="input" name="telephone" value="<?= $Profil->telephone ?>">
        </div>
      </form>
    </section>
    <footer class="modal-card-foot">
      <div class="buttons">
        <button class="button is-success" id="savePhone">Enregistrer</button>
        <button class="button" id="closeModal" for="modalPhone">Annuler</button>
      </div>
    </footer>
  </div>
</div>

<script>
document.getElementById('saveMail').addEventListener('click', function() {
  var emailInput = document.getElementById('mailForm').querySelector('input[name="mail"]');
  var email = emailInput.value.trim();
  
  if (validateEmail(email)) {
    document.getElementById('mailForm').submit();
  } else {
    // Display an error message or handle the invalid email address
    alert('Entrez une adresse email valide !');
  }
});

function validateEmail(email) {
  // Use a regular expression to validate the email address
  var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}

document.getElementById('savePhone').addEventListener('click', function() {
  if(!validatePhoneNumber(document.querySelector('input[name="telephone"]').value)) {
    alert("Veuillez entrer un numéro de téléphone valide.");
    return;
  }
  document.getElementById('phoneForm').submit();
});
</script>
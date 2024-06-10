<?php
require_once 'config/auth.php';

if(($_GET["page"] == "view_profil" && $_SESSION['statut'] == "Professeur") || $_GET["page"] == "profil") {

  // Vérifier si les détails du profil sont disponibles
  if($Profil) {
    // Afficher les détails du profi

    $userPoints = $profilModel->getPointByUser($Profil->id);
    $tuteurs = $profilModel->list_by_professeur();
    $table_name = 'user';
    $id = $Profil -> id;

    if(isset($userPoints->points)) {
      $userPoints = $userPoints->points;
    }else{
      $userPoints = 0;
    }
    ?>

    <style>


    .card-content {
      text-align: center;
    }

    .blue-line-bottom {
      border-bottom: 2px solid #00d1b2;
    }
    .orange-line-bottom {
      border-bottom: 2px solid orange;
    }

    .unselectable {
      -webkit-user-select: none;  /* Chrome all / Safari all */
      -moz-user-select: none;     /* Firefox all */
      -ms-user-select: none;      /* IE 10+ */
      user-select: none;          /* Likely future */
      cursor: default;            /* Non-essential, but cursor should not change when selecting text */
    }

  </style>

  <div class="container">
    <div class="columns">
      <div class="column is-one-third">
        <div class="box">
          <div class="content">
            <h3 class="title is-4 has-text-centered blue-line-bottom mb-4"><?= $Profil->nom ?> <?= $Profil->prenom ?></strong></h3>
            <p class="card-text">Nom: <strong><?= $Profil->nom ?></strong> </p>
            <p class="card-text">Prénom: <strong><?= $Profil->prenom ?></strong> </p>
            <p class="card-text">Mail: <strong><?= $Profil->email ? $Profil->email : '<span class="icon"><i class="fas fa-magnifying-glass-minus"></i></span>' ?></strong> </p>
            <p class="card-text">Login: <strong><?= $Profil->login ? $Profil->login : '<span class="icon"><i class="fas fa-magnifying-glass-minus"></i></span>' ?></strong> </p>
            <p class="card-text">Statut: <strong><?= $Profil->statut ? $Profil->statut : '<span class="icon"><i class="fas fa-magnifying-glass-minus"></i></span>'  ?></strong> </p>

            <!-- ------------------------------------------QUE POUR LES PROFILS DES ETUDIANTS-----------------------------  -->
            <?php if($Profil->statut=='Etudiant'){?>

              <p class="card-text">Groupe: <strong><?= $Profil->classe ?></strong> </p>
              <p class="card-text">Promotion: <strong><?= $Profil->promo ? $Profil->promo :  '<span class="icon"><i class="fas fa-magnifying-glass-minus"></i></span>' ?></strong> </p>
              <p class="card-text">Spécialité: <strong><?= $Profil->spe ? $Profil->spe : '<span class="icon"><i class="fas fa-magnifying-glass-minus"></i></span>'  ?></strong>
                <?php if ($_SESSION['statut'] == "Professeur") { ?>
                  <button id="openModal" for="modalSpe" class="button is-small">
                    <span class="icon">
                      <i class="fas fa-pencil-alt"></i>
                    </span>
                  </button> <?php }
                  else {
                    echo '';
                  }
                  ?>

                  <div class="modal" id="modalSpe">
                    <div class="modal-background"></div>
                    <div class="modal-card">
                      <header class="modal-card-head">
                        <p class="modal-card-title">Modification de spécialité</p>
                      </header>
                      <section class="modal-card-body">


                        <form id="speForm" method="post">
                          <p class="card-text">
                            <div class="is-grouped">
                              Spécialité:
                              <input type="hidden" name="id" class="id" value="<?= isset($Profil->id) ? $Profil->id : "" ?>">
                              <div class="select is-small" id="selectSpe">
                                <select name="spe">
                                  <?php
                                  ?>
                                  <option value="SLAM" <?= $Profil->spe == "SLAM" ? "selected" : "" ?>>SLAM</option>
                                  <option value="SISR" <?= $Profil->spe == "SISR" ? "selected" : "" ?>>SISR</option>
                                  <option value=""<?= $Profil->spe == "" || $Profil->spe == NULL ? "selected" : ""?>> Pas de spécialité</option>
                                </select>


                              </div>
                            </form>
                            <?php
                            if (isset($_POST["id"]) && isset($_POST["spe"])) {

                              $profilId = $_POST["id"];
                              $spe = $_POST["spe"];

                              $sql = "UPDATE " . $table_name . " SET spe = :spe WHERE id = :id";
                              $stmt = $conn->prepare($sql);
                              $stmt->bindParam(":id", $profilId);
                              $stmt->bindParam(":spe", $spe);
                              $stmt->execute();
                              echo "<script type='text/javascript'>
                              window.location.href = window.location.href;
                              </script>";
                              exit;
                            }


                            ?>

                            <?php   ?>



                          </section>
                          <footer class="modal-card-foot">
                            <div class="buttons">
                              <button class="button is-success" id="saveSpe">Enregistrer</button>

                              <button class="button" id="closeModal" for="modalSpe">Annuler</button>

                              <script>
                              document.getElementById('saveSpe').addEventListener('click', function() {
                                document.getElementById('speForm').submit();
                              });

                            </script>

                          </div>
                        </footer>
                      </div>
                    </div>




                  </p>
                  <p class="card-text">Tuteur: <strong><?php if (isset ($Profil->idTuteur)){
                    foreach ($tuteurs as $tuteur) {
                      if (isset($Profil->idTuteur) && $Profil->idTuteur == $tuteur->id) {
                        echo "<strong> $tuteur->nom $tuteur->prenom</strong>";
                      }}
                    }
                    else {
                      echo '<span class="icon"><i class="fas fa-magnifying-glass-minus"></i></span>';
                    }
                    ?> <?php if ($_SESSION['statut'] == "Professeur") { ?>
                      <button id="openModal" for="modalTuteur" class="button is-small">
                        <span class="icon">
                          <i class="fas fa-pencil-alt"></i>
                        </span>
                      </button>
                    <?php } else {
                      echo '';
                    }?>

                    <!-- -------------------------------DEBUT DE MODAL---------------------------------------- -->

                    <div class="modal" id="modalTuteur">
                      <div class="modal-background"></div>
                      <div class="modal-card">
                        <header class="modal-card-head">
                          <p class="modal-card-title">Modification de tuteur</p>
                        </header>
                        <section class="modal-card-body">


                          <p class="card-text">Tuteur actuel: <?php if (isset ($Profil->idTuteur)){
                            foreach ($tuteurs as $tuteur) {
                              if (isset($Profil->idTuteur) && $Profil->idTuteur == $tuteur->id) {
                                echo "<strong> $tuteur->nom $tuteur->prenom</strong>";
                              }}
                            }
                            else {
                              echo '';
                            }
                            ?>
                            <?php
                            if (isset($_POST["id"]) && isset($_POST["idTuteur"])) {

                              $profilId = $_POST["id"];
                              $idTuteur = $_POST["idTuteur"];

                              $sql = "UPDATE " . $table_name . " SET idTuteur = :idTuteur WHERE id = :id";
                              $stmt = $conn->prepare($sql);
                              $stmt->bindParam(":id", $profilId);
                              $stmt->bindParam(":idTuteur", $idTuteur);
                              $stmt->execute();
                              echo "<script type='text/javascript'>
                              window.location.href = window.location.href;
                              </script>";
                              exit;
                            }

                            ?>

                            <form id="tuteurForm" method="post">
                              <p class="card-text">
                                <div class="is-grouped">
                                  Nouveau tuteur:
                                  <input type="hidden" name="id" class="id" value="<?= isset($Profil->id) ? $Profil->id : "" ?>">
                                  <div class="select is-small" id="selectTuteur">
                                    <select name="idTuteur">
                                      <?php if (isset($Profil->idTuteur)) { ?>
                                        <?php foreach ($tuteurs as $tuteur) : ?>
                                          <option value="<?= $tuteur->id ?>" <?= isset($Profil->idTuteur) && $Profil->idTuteur == $tuteur->id ? "selected" : "" ?>>
                                            <?= "$tuteur->nom $tuteur->prenom" ?>
                                          </option>
                                        <?php endforeach; ?>
                                      <?php } else { ?>
                                        <option value="">Aucun professeur assigné</option>
                                        <?php foreach ($tuteurs as $tuteur) : ?>
                                          <option value="<?= $tuteur->id ?>">
                                            <?= "$tuteur->nom $tuteur->prenom" ?>
                                          </option>
                                        <?php endforeach; ?>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                              </p>
                            </form>
                          </p>
                        </section>
                        <footer class="modal-card-foot">
                          <div class="buttons">
                            <button class="button is-success" id="saveTuteur">Enregistrer</button>

                            <button class="button" id="closeModal" for="modalTuteur">Annuler</button>

                            <script>
                            document.getElementById('saveTuteur').addEventListener('click', function() {
                              document.getElementById('tuteurForm').submit();
                            });

                          </script>
                        </strong>
                      </div>
                    </footer>
                  </div>
                </div>

                <?php


                ?></p></p>
                <p class="card-text">Points d'activité obtenu : <strong><?= $userPoints ?></strong> </p>
              </span>
              <a href="../router.php?page=<?= $Profil->id != $_SESSION["userID"] ? "edit_profil&id=" . $Profil->id : "edit_my_profil" ?>"  class="button is-primary mt-4">Modifier &nbsp;<span class="icon"><i class="fas fa-pencil-alt"></i></a>
                <?php if($_SESSION['statut'] == "Professeur" && $Profil->statut != "Professeur"):?><button class="button is-danger mt-4" id="openModal" for="modalDelete">Supprimer &nbsp;<p class="icon"><i class="fas fa-trash-alt"></i></button><?php endif;?>
                </div>
              </div>
            </div>

            <?php
          }
          // ------------------------------------LA PARTIE DE BOX DE STAGE--------------------------------------

          $statut=$Profil->statut;
          if ($statut=='Etudiant'){
            ?>

            <div class="column is-two-third">
              <div class="box">
                <div style="display: flex; flex-direction: column; height: 100%;">
                  <h3 class="title is-4 has-text-centered orange-line-bottom">Stages effectués</h3>
                  <?php if (isset($stages[0])) {
                    foreach ($stages as $stage) {?>

                      <table class="table table-striped table-hover tableFilter" id="maTable">
                        <thead>
                          <tr>
                            <th>Entreprise</th>
                            <th>Classe</th>
                            <th>Date début</th>
                            <th>Date fin</th>
                            <th>Maitre de stage</th>
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
                      <?php
                    }
                  }else{
                    echo "<br>L'étudiant n'a pas effectué de stage.";
                  }?>
                </div>
              </div>
            <?php }?>
          </div>
        </div>
      </div></div>
      <?php if($_SESSION['statut'] == "Professeur" && $Profil->statut != "Professeur"):?>

        <div class="modal" id="modalDelete">
          <div class="modal-background"></div>
          <div class="modal-card">
            <header class="modal-card-head">
              <p class="modal-card-title">Êtes-vous sûr(e) ?</p>
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
                  <b><?= $Profil->nom?> <?= $Profil->prenom?></b></p>

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
        </script>

      <?php endif;?>




    <?php } else {
      // Si aucun profil n'a été trouvée, afficher un message d'erreur
      echo "<p>Aucun profil trouvé avec ce lien.</p>";
    }

  } else{
    header("Location: ../router.php?page=profil");
  }//Fin de la vérification de si l'utilisateur est connecté en tant que prof
  ?>

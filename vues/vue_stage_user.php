<?php
require_once 'config/auth.php';


//ajouter session id =:id
if(($_GET["page"] == "stage_read" && $_SESSION['statut'] == "Professeur") || $_GET["page"] == "stage") {

  // Vérifier si les détails du profil sont disponibles
  $stage=$stage["0"];
  if(isset($stage)) {
    // $statut=$Profil->statut; $nomVariable = $nomVariable["0"]
    //if ($statut=='Etudiant'){
    // Afficher les détails du profi

    if(isset($Profil)){



      ?>
      <style>
      .card {
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .card-content {
        text-align: center;
      }

      .blue-line-bottom {
        border-bottom: 2px solid #00d1b2;
        padding-bottom: 0.5rem;
      }
      .green-line-bottom {
        border-bottom: 2px solid #23d160;
        padding-bottom: 0.5rem;
      }

      .yellow-line-bottom {
        border-bottom: 2px solid #ffdd57;
        padding-bottom: 0.5rem;
      }
      </style>

      <body>
        <h3 class="title is-4 has-text-centered green-line-bottom mb-4">Stage <?= $stage->classe ?>: <?= $stage->EtudiantNom ?> <?=$stage ->EtudiantPrenom?></h3>

        <!-- ---------------LA PARTIE DE PROFIL D'ETUDIANT----------------------  -->


        <div class="container">
          <div class="columns">
            <div class="column is-one-third">
              <div class="box">
                <div class="card-content">
                  <div class="content">
                    <h4 class="title is-5 has-text-centered blue-line-bottom mb-4">Etudiant</h3>

                      <p class="card-text">Nom: <strong><?= $stage->EtudiantNom ?></strong> </p>
                      <p class="card-text">Prénom: <strong><?= $stage->EtudiantPrenom ?></strong> </p>
                      <p class="card-text">Mail: <strong><?= $stage->EtudiantEmail ? $stage->EtudiantEmail : "-" ?></strong> </p>
                      <p class="card-text">Téléphone: <strong><?= $stage->EtudiantTel ? $stage->EtudiantTel : "-" ?></strong> </p>
                      <p class="card-text">Classe: <strong><?= $stage->classe ?></strong> </p>
                      <p class="card-text">Spécialité: <strong><?= $stage->EtudiantSpe ? $stage->EtudiantSpe : "-"  ?></strong> </p>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              ?>
              <!-- ---------------LA PARTIE D'ENTREPRISE----------------------  -->

              <div class="column is-one-third">
                <div class="card-content">
                  <div class="box"  style="display: flex; flex-direction: column; height: 100%;">
                    <h4 class="title is-5 has-text-centered blue-line-bottom mb-4">Entreprise</h3>
                      <?php



                      ?>

                      <p>Entreprise: <a href="../router.php?page=fiche_entreprise&idEntreprise=<?= $stage->idEntreprise ?>"><?= $stage->Entreprise ?></a></p>
                      <p class="card-text">Siert: <strong><?= $stage->siret ?></strong> </p>
                      <p class="card-text">Adresse: <BR>
                        <?= $stage->Entreprise_adresse ?><BR>
                        <?= $stage->Entreprise_codePostal ? $stage->Entreprise_codePostal  : "-" ?> <?= $stage->Entreprise_ville ? $stage->Entreprise_ville  : "-" ?>
                      </p>
                      <p class="card-text">Effectif: <strong><?=$stage->Entreprise_effectif ? $stage->Entreprise_effectif  : "-" ?></strong> </p>
                      <p class="card-text">Type: <strong><?=$stage->Entreprise_naf ? $stage->Entreprise_naf  : "-" ?></strong> </p>


                      <?php


                    }
                    else{
                      echo "Erreur";
                    }
                    ?>
                  </div>
                </div></div>

                <!-- ---------------LA PARTIE DE CONTACT----------------------  -->

                <div class="column is-one-third">
                  <div class="card-content">
                    <div class="box"  style="display: flex; flex-direction: column; height: 100%;">
                      <h4 class="title is-5 has-text-centered blue-line-bottom mb-4">Contact</h3>

                        <p class="card-text">Maître de stage: <strong><a href="../router.php?page=Contact_fiche&idContact=<?=
                        $stage->idMaitreDeStage ?>"><?= $stage->employe_nom . " " . $stage->employe_prenom ?></a></strong> </p>
                        <p class="card-text">Fonction: <strong><?= $stage->employe_fonction ?></strong> </p>
                        <p class="card-text">Mail: <strong><?= $stage->employe_mail ?></strong> </p>
                        <p class="card-text">Téléphone: <strong><?= $stage->employe_telephone ?></strong> </p>
                        <br>
                        <h4 class="title is-5 has-text-centered yellow-line-bottom mb-4">Details de stage</h3>
                          <p class="card-text">Debut:  <strong><?= $stage->dateDebut ?></strong> </p>
                          <p class="card-text">Fin:  <strong><?= $stage->dateFin ?></strong> </p>
                          <p class="card-text">Professeur assigné: <strong></strong> </p>

                        </div>
                      </div>
                    </div>
                  </div>

                  <p class="title is-1">Stage <?= $stage->classe ?></strong></p>
                  <p class="subtitle is-3"><?= $stage->EtudiantNom ?> <?= $stage->EtudiantPrenom ?></p>
                  <HR>
                    <div class="box">
                          <p class="card-header-title" style="text-align: left;"> Nom de l'étudiant: Jean Dupont</p>
                          <p>Entreprise: <a href="../router.php?page=fiche_entreprise&idEntreprise=<?= $stage->idEntreprise ?>"><?= $stage->Entreprise ?></a></p>
                          <p>Position: Développeur Web</p>
                          <p>Durée:6 semaines (Janvier 2024 - fevrier 2024)</p>
                          <HR>
                          <p>Description:</p>
                          <p>Jean travaille sur le développement de nouvelles fonctionnalités pour le site web de l'entreprise en utilisant des technologies modernes comme React et Node.js.</p>
                    </div>
                  <?php
                  //}

                }
                else {
                  // Si aucun profil n'a été trouvée, afficher un message d'erreur
                  echo "<p>Aucun profil trouvé avec ce lien.</p>";
                }

              }
              else{
                header("Location: ../router.php?page=profil");
              }//Fin de la vérification de si l'utilisateur est connecté en tant que prof

              ?>

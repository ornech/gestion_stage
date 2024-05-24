<?php
require_once 'config/auth.php';
?>

<section class="section">
    <div class="container">
        <form action="../controller/stage_create.php" method="post">

          <p class="is-size-3 espacement">
              Ajout d'un nouveau stage :
          </p>

          <input type="hidden" name="idEntreprise" value="<?= $idEntreprise; ?>"/>
          <input type="hidden" name="idEtudiant" value="<?= $idUser; ?>"/>
          <div class="assemble">
            <div class="field">
                <label for="idMaitreDeStage" class="label">Maitre de stage</label>
                <div class="control has-icons-left">
                    <div class="select">
                        <select id="idMaitreDeStage" name="idMaitreDeStage">
                          
                            <?php
                              foreach ($contacts as $contact) {
                                echo '<option value="'. $contact->EmployeID. '">' . $contact->nom . " " . $contact->prenom . '</option>';
                              }
                            ?>

                        </select>
                    </div>
                    <span class="icon is-small is-left">
                        <i class="fas fa-user-tie"></i>
                    </span>
                </div>
            </div>

            <div class="field">
              <label for="classe" class="label">Classe</label>
              <div class="control has-icons-left">
                  <div class="select">
                      <select id="classe" name="classe">
                          <option value="SIO1" selected>SIO 1</option>
                          <option value="SIO2">SIO 2</option>
                          <option value="autre">Autre</option>
                      </select>
                  </div>
                  <span class="icon is-small is-left">
                      <i class="fas fa-user-graduate"></i>
                  </span>
              </div>
            </div>
          </div>


          <div class="assemble">
            <div class="field">
                <label for="dateDebut" class="label">Début du stage</label>
                <div class="control has-icons-left has-icons-right">
                    <input type="date" id="dateDebut" name="dateDebut" class="input" ondblclick="this.showPicker()">
                    <span class="icon is-small is-left">
                        <i class="fas fa-hourglass-start"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label for="duree" class="label">Durée du stage</label>
                <div class="control has-icons-left">
                    <div class="select">
                        <select id="duree" name="duree">
                            <option value="6" selected>6</option>
                            <option value="5" >5</option>
                            <option value="4" >4</option>
                        </select>
                    </div>
                    <span class="icon is-small is-left">
                        <i class="fas fa-clock"></i>
                    </span>
                </div>
            </div>  
          </div>
          
          <!-- <div class="field">
              <label for="dateFin" class="label">Fin du stage</label>
              <div class="control has-icons-left has-icons-right">
                  <input type="date" id="dateFin" name="dateFin" class="input" ondblclick="this.showPicker()">
                  <span class="icon is-small is-left">
                      <i class="fas fa-hourglass-end"></i>
                  </span>
              </div>
          </div>   -->

          <div class="control espacement">
              <button class="button is-primary">Ajouter</button>
          </div>

        </form>
    </div>
</section>

<style>
   .espacement{
      margin-top: 20px;
      margin-bottom: 20px;
   }

  /* input[type="date"]::-webkit-calendar-picker-indicator {
    display: none;
  } */

  .assemble{
    display: flex;
    gap: 2%;
  }

</style>
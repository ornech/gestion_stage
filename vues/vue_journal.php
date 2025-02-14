<?php
require_once 'config/auth.php';

setlocale(LC_TIME, 'fr_FR.UTF-8');
$fmt = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE, 'Europe/Paris', IntlDateFormatter::GREGORIAN);

function getCompetance($resultCompetence){
  $competences = [
    1 => "Gérer le patrimoine informatique",
    2 => "Répondre aux incidents et aux demandes d’assistance et d’évolution",
    4 => "Développer la présence en ligne de l’organisation",
    8 => "Travailler en mode projet",
    16 => "Mettre à disposition des utilisateurs un service informatique",
    32 => "Organiser son développement professionnel",
  ];

  foreach(array_reverse($competences, true) as $id => $competence){
    if($id <= $resultCompetence){
      $result[] = $competence;
    }
  }

  if(empty($result)){
    echo "Aucune compétence";
  }else{
    echo "<ul>";
    foreach($result as $competence){
      echo "<li>$competence</li>";
    }
    echo "</ul>";
  }
  


}

if(isset($stages) && isset($journalModel)): ?>
  <div class="content is-normal">

<!-- TODO 
- Déterminé quel stage sera affiché par défaut 
  |-> S'il n'y a pas de stage, afficher que qu'aucun stage a été trouvé
  |-> S'il y a qu'un stage, on l'affiche directement
  |-> S'il y a plusieurs stages, on affiche un menu déroulant pour choisir le stage à afficher
    |-> Et par défaut on affiche le dernier stage éffectué par rapport à la date de début si elle est égale ou inférieur à la date d'aujourd'hui
    (Exemple j'ai deux stage un du 01/11/2024 au 01/12/2024 et un autre du 20/03/2025 au 1/05/2025, on affichera le premier stage par défaut car le dernier stage n'a pas encore commencé)
    (Autre exemple j'ai trois stage: 1) du 01/11/2024 au 01/12/2024 2) du 01/01/2025 au 20/02/2025 3) du 20/03/2025 au 1/05/2025, on affichera le deuxième stage par défaut car le deuxième est plus proche de la date d'aujourd'hui et le début du stage est déjà passé)
    |-> SAUF SI il y a une variable $_GET['idStage'] qui est définie, dans ce cas on affiche le stage correspondant à l'id
  
  - Afficher les journaux de bord du stage
  |-> Réparties les réalisation par semaines dans un espèce de tableau interactif grâce à Bulma
  |-> Chaque réalisation doit avoir un bouton pour la supprimer
  |-> Un bouton pour ajouter une réalisation

  - Ajouter une réalisation
  |-> Un formulaire avec les champs suivants:
    |-> Titre
    |-> Description
    |-> Compétences (Liste de checkboxs 10 checkboxs comme options à cocher ou non)
    |-> Semaine
    |-> Un bouton pour ajouter la réalisation
    |-> Un bouton pour annuler

  - Supprimer une réalisation
  |-> Un bouton pour supprimer la réalisation
  |-> Un message de confirmation avant de supprimer la réalisation

-->

    <?php
    $date = date('Y-m-d');

    //Récupère le dernier stage effectué ou en cours si aucun stage n'est défini
    if(count($stages) != 0):
      if(!isset($stage)){
        if(count($stages) == 1){
          $stage = $stages[0];
        }else if(count($stages) > 1){
          $stage = $stages[0];

          $intervalJours = null;
          foreach($stages as $s){
            if($s->dateDebut <= $date){
              $interval = date_diff(new DateTime($s->dateDebut), new DateTime($date));
              if($intervalJours == null || $interval->days < $intervalJours){
                $intervalJours = $interval->days;
                $stage = $s;
              }
            }
          }
        }
      }

      $nbSemaine = ceil((strtotime($stage->dateFin) - strtotime($stage->dateDebut)) / (60 * 60 * 24 * 7));

      //Déterminé la semaine la plus proche de la date d'aujourd'hui en se basant sur la date de début et de fin du stage
      $selectedSemaine = 1;

      for($i = 1; $i <= $nbSemaine; $i++){
        $dateDebut = date('Y-m-d', strtotime($stage->dateDebut . " + " . ($i - 1) * 7 . " days"));
        $dateFin = date('Y-m-d', strtotime($stage->dateDebut . " + " . $i * 7 . " days"));

        if($dateDebut <= $date && $date <= $dateFin){
          $selectedSemaine = $i;
          break;
        }
      }
    ?>
    
    <div class="container is-fluid">
        <h1 class="title is-1"><?php echo $Profil->nom . " " . $Profil->prenom ?></h1>
        <h2 class="subtitle is-2">Stage du <?php echo $fmt->format(new DateTime($stage->dateDebut)) ?> au <?php echo $fmt->format(new DateTime($stage->dateFin)) ?></h2>

        <label class="label">Stage sélectionné:</label>

        <div class="select is-fullwidth">
          <select onchange="window.location.href = 'router.php?page=journal&idStage=' + this.value">
            <?php foreach($stages as $s): ?>
              <option value="<?= $s->idStage ?>" <?= $s->idStage == $stage->idStage ? "selected" : "" ?>><?= $s->Entreprise . " (" . $s->classe . ")" ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="box mt-5">
          <h3 class="title is-3">Journal de bord</h3>
          <div class="tabs is-boxed">
            <ul>
              <?php for($semaine = 1; $semaine <= $nbSemaine; $semaine++): ?>
                <li class="<?= $semaine == $selectedSemaine ? 'is-active' : '' ?>" data-tab="semaine-<?= $semaine ?>">
                <a>Semaine <?= $semaine ?></a>
                </li>
              <?php endfor; ?>
            </ul>
          </div>
          <?php foreach($journalModel->getRealisationsPerSemaineByStage($stage->idStage, $nbSemaine) as $semaine => $realisations): ?>
            <div class="tab-content <?= $semaine != $selectedSemaine ? 'is-hidden' : '' ?>" id="semaine-<?= $semaine ?>">
              <div class="columns is-multiline">
                <?php if(empty($realisations)): ?>
                  <div class="column is-12">
                    <div class="notification is-warning">
                      Aucune réalisation pour cette semaine.
                    </div>
                  </div>
                <?php else: ?>
                  <?php foreach($realisations as $realisation): ?>
                    <div class="column is-<?= 12 / min(count($realisations), 3) ?> realisation">
                      <div class="box">
                        <h5 class="title is-5"><?= htmlspecialchars($realisation->titre) ?></h5>
                        <p><?= nl2br(htmlspecialchars($realisation->description)) ?></p>
                        <p><strong>Compétences:</strong> <?= getCompetance(htmlspecialchars($realisation->competences)) ?></p>
                        <form method="post" action="router.php?page=deleteRealisation" style="margin-top: 10px;">
                          <input type="hidden" name="idRealisation" value="<?= $realisation->id ?>">
                          <button type="submit" class="button is-danger is-small" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réalisation ?')">Supprimer</button>
                        </form>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <script>
          document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('.tabs li');
            const tabContents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
              tab.addEventListener('click', () => {
                tabs.forEach(item => item.classList.remove('is-active'));
                tab.classList.add('is-active');

                const target = tab.dataset.tab;
                tabContents.forEach(content => {
                  if (content.id === target) {
                    content.classList.remove('is-hidden');
                  } else {
                    content.classList.add('is-hidden');
                  }
                });
              });
            });
          });
        </script>

        <style>


        </style>

        <div class="box is-hidden">
          <h3 class="title is-3">Ajouter une réalisation</h3>
          <form method="post" action="router.php?page=addRealisation">
            <div class="field">
              <label class="label">Titre</label>
              <div class="control">
                <input class="input" type="text" name="titre" required>
              </div>
            </div>
            <div class="field">
              <label class="label">Description</label>
              <div class="control">
                <textarea class="textarea" name="description" required></textarea>
              </div>
            </div>
            <div class="field">
              <label class="label">Compétences</label>
              <div class="control">
                <?php for($i = 1; $i <= 10; $i++): ?>
                  <label class="checkbox">
                    <input type="checkbox" name="competences[]" value="Compétence <?= $i ?>"> Compétence <?= $i ?>
                  </label>
                <?php endfor; ?>
              </div>
            </div>
            <div class="field">
              <label class="label">Semaine</label>
              <div class="control">
                <input class="input" type="number" name="semaine" min="1" required>
              </div>
            </div>
            <div class="field is-grouped">
              <div class="control">
                <button type="submit" class="button is-link">Ajouter</button>
              </div>
              <div class="control">
                <button type="reset" class="button is-light">Annuler</button>
              </div>
            </div>
          </form>
        </div>

    </div>
    <?php else: ?>
      <div class="notification is-danger">
        Aucun stage n'a été trouvé
      </div>
      <a href="javascript:history.back()" class="button is-link">Retour</a>

    <?php endif; ?>
  </div>
<?php endif; ?>

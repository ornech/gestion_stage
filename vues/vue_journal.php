<?php
require_once 'config/auth.php';

setlocale(LC_TIME, 'fr_FR.UTF-8');
$fmt = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE, 'Europe/Paris', IntlDateFormatter::GREGORIAN);

if(isset($stages) && isset($journalModel)): ?>

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
  //Récupère le dernier stage effectué ou en cours si aucun stage n'est défini
  if(count($stages) != 0):
    if(!isset($stage)){
      if(count($stages) == 1){
        $stage = $stages[0];
      }else if(count($stages) > 1){
        $stage = $stages[0];
        $date = date('Y-m-d');

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
        <h3 class="title is-3">Journaux de bord</h3>
        <?php foreach($journalModel->getRealisationsByStage($stage->idStage) as $semaine => $realisations): ?>
          <h4 class="title is-4">Semaine <?= $semaine ?></h4>
          <div class="columns is-multiline">
            <?php foreach($realisations as $realisation): ?>
              <div class="column is-<?= 12 / min(count($realisations), 3) ?>">
                <div class="box">
                  <h5 class="title is-5"><?= htmlspecialchars($realisation->titre) ?></h5>
                  <p><?= nl2br(htmlspecialchars($realisation->description)) ?></p>
                  <p><strong>Compétences:</strong> <?= htmlspecialchars($realisation->competences) ?></p>
                  <form method="post" action="router.php?page=deleteRealisation" style="margin-top: 10px;">
                    <input type="hidden" name="idRealisation" value="<?= $realisation->id ?>">
                    <button type="submit" class="button is-danger is-small" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réalisation ?')">Supprimer</button>
                  </form>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
      </div>

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

<?php endif; ?>

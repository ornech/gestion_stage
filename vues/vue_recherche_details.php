<?php
require_once 'config/auth.php';
include 'vues/var_data.php';

?>


<?PHP
//var_dump($resultats);
// Nomenclature code api insee



if ($resultats["uniteLegale"]["etatAdministratifUniteLegale"] == "C") {
  $etatAdministratif = '<i class="fa fa-times" aria-hidden="true" style="color: red;"></i><span style="color: red;"> Cessation d\'acticité </span>';
} else {
  $etatAdministratif = "En activité";
}



// Récupération de la tranche d'effectifs avec une expression régulière
if (preg_match('/^(\d{2})/', $resultats["uniteLegale"]["trancheEffectifsUniteLegale"], $matches)) {
  $trancheEffectifs = $code_trancheEffectifsUniteLegale[$matches[1]]; // Utilisation du premier groupe capturant
} else {
  // Si aucune correspondance n'est trouvée, affectez une valeur par défaut ou un message d'erreur
  $trancheEffectifs = "-";
}



?>

  <a type="button" href="router.php?page=create_entreprise&nomEntreprise=<?php echo $resultats["uniteLegale"]["denominationUniteLegale"]; ?>"> test </a>



<br>
<div class="container">
  <h1>Détails: <?= $resultats["uniteLegale"]["denominationUniteLegale"] ?></h1>
  <div class="row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="card">
        <h5 class="card-header">Informations générales</h5>
        <div class="card-body">
          <ul class="list-group ">
            <li class="list-group-item"><strong>SIREN :</strong> <?= $resultats["siren"] ?></li>
            <li class="list-group-item"><strong>SIRET :</strong> <?= $resultats["siret"] ?></li>
            <li class="list-group-item"><strong>Statut INSEE :</strong> <?php echo $etatAdministratif; ?></li>
            <li class="list-group-item"><strong>Nombre d'employé:</strong>
              <?php echo $trancheEffectifs ?>
            </li>
            <li class="list-group-item"><strong>Status juriduque :</strong>
              <?php
              $code_juridique = $resultats["uniteLegale"]["categorieJuridiqueUniteLegale"];
              echo $codes_categorieJuridiqueUniteLegale["$code_juridique"];
              ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <h5 class="card-header">Adresse de l'établissement</h5>

        <div class="card-body">
          <p >
            <?php echo $resultats['adresseEtablissement']['numeroVoieEtablissement']; ?>
            <?php echo $resultats['adresseEtablissement']['typeVoieEtablissement']; ?>
            <?php echo $resultats['adresseEtablissement']['libelleVoieEtablissement']; ?> <BR>
            <?php echo $resultats['adresseEtablissement']['complementAdresseEtablissement']; ?> <BR>
            <?php echo $resultats['adresseEtablissement']['codePostalEtablissement']; ?>
            <?php echo $resultats['adresseEtablissement']['libelleCommuneEtablissement']; ?>
            </p>
          </div>
        </div>
        <BR>
        <div class="container">
          <a class="btn btn-warning" role="button" href="https://www.pagesjaunes.fr/siret/<?= $resultats["siret"] ?>" target='_blank' rel='noopener noreferrer'>Pagesjaunes.fr</a>
          <a class="btn btn-warning" role="button" href="https://www.societe.com/cgi-bin/search?champs=<?= $resultats["siret"] ?>" target='_blank' rel='noopener noreferrer'>Societe.com</a>

          <?php
          function remplacerEspacesParPlus($chaine) {
            // Utilisation de la fonction str_replace pour remplacer les espaces par des "+"
            $chaine = str_replace(' ', '+', $chaine);
            return $chaine;
          }
          $rue = remplacerEspacesParPlus($resultats['adresseEtablissement']['libelleVoieEtablissement']);
          $complement = remplacerEspacesParPlus($resultats['adresseEtablissement']['complementAdresseEtablissement']);

          ?>
          <a class="btn btn-warning" role="button" href="https://www.google.com/maps/search/<?php echo $resultats['adresseEtablissement']['numeroVoieEtablissement']?>+<?php echo $resultats['adresseEtablissement']['typeVoieEtablissement']?>+<?php echo $rue?>+<?php echo $complement?>+<?php echo $resultats['adresseEtablissement']['codePostalEtablissement']?>+<?php echo $resultats['adresseEtablissement']['libelleCommuneEtablissement']?>" target='_blank' rel='noopener noreferrer'>Googlemap</a>
        </div>
      </div>
    </div>
  </div>

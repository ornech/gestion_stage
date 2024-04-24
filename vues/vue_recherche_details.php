<?php
require_once 'config/auth.php';
?>
<div class="container">
<a class="btn btn-warning" role="button" href="https://www.pagesjaunes.fr/siret/<?= $resultats["SIRET"] ?>" target='_blank' rel='noopener noreferrer'>Pagesjaunes.fr</a>
<a class="btn btn-warning" role="button" href="https://www.societe.com/cgi-bin/search?champs=<?= $resultats["SIRET"] ?>" target='_blank' rel='noopener noreferrer'>Societe.com</a>

<?php
function remplacerEspacesParPlus($chaine) {
    // Utilisation de la fonction str_replace pour remplacer les espaces par des "+"
    $chaine = str_replace(' ', '+', $chaine);
    return $chaine;
}
$chaineModifiee = remplacerEspacesParPlus($resultats["Adresse de l'établissement"]["Libellé de la voie"]);
?>
<a class="btn btn-warning" role="button" href="https://www.google.com/maps/place/<?php echo $resultats["Adresse de l'établissement"]["Numéro de voie"]?>+<?php echo $resultats["Adresse de l'établissement"]["Type de voie"]?>+<?php echo $chaineModifiee?>+<?php echo $resultats["Adresse de l'établissement"]["Code postal"]?>+<?php echo $resultats["Adresse de l'établissement"]["Commune"]?>" target='_blank' rel='noopener noreferrer'>Googlemap</a>
</div>
<br>
<div class="container">
  <h1>Détails: <?= $resultats["Unité légale associée à l'entreprise"]["Dénomination de l'unité légale"] ?></h1>
  <div class="row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="card">
        <h5 class="card-header">Informations générales</h5>
        <div class="card-body">
          <ul class="list-group ">
            <li class="list-group-item"><strong>SIREN :</strong> <?= $resultats["SIREN"] ?></li>
            <li class="list-group-item"><strong>SIRET :</strong> <?= $resultats["SIRET"] ?></li>
            <li class="list-group-item"><strong>Statut de diffusion de l'établissement :</strong> <?= $resultats["Statut de diffusion de l'établissement"] ?></li>
            <li class="list-group-item"><strong>Date de création de l'établissement :</strong> <?= $resultats["Date de création de l'établissement"] ?></li>
            <li class="list-group-item"><strong>Nombre de périodes de l'établissement :</strong> <?= $resultats["Nombre de périodes de l'établissement"] ?></li>
            <li class="list-group-item"><strong>Établissement siège :</strong> <?= $resultats["Établissement siège"] ?></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <h5 class="card-header">Adresse de l'établissement</h5>

        <div class="card-body">
          <ul class="list-group">
            <?php foreach ($resultats["Adresse de l'établissement"] as $key => $value) : ?>
              <li class="list-group-item"><strong><?= $key ?> :</strong> <?= $value ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>


  <div class="card-body">
    <h5 class="card-title">Unité légale associée à l'entreprise</h5>
    <ul class="list-group">
      <?php foreach ($resultats["Unité légale associée à l'entreprise"] as $key => $value) : ?>
        <li class="list-group-item"><strong><?= $key ?> :</strong> <?= $value ?></li>
      <?php endforeach; ?>
    </ul>
  </div>

  <div class="card mt-3">
    <div class="card-body">
      <h5 class="card-title">Périodes de l'établissement</h5>
      <ul class="list-group">
        <?php foreach ($resultats["Périodes de l'établissement"] as $periode) : ?>
          <li class="list-group-item">
            <strong>Date de début :</strong> <?= $periode["Date de début"] ?> |
            <strong>Date de fin :</strong> <?= $periode["Date de fin"] ?> |
            <strong>État administratif :</strong> <?= $periode["État administratif"] ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>

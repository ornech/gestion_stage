<!-- accueil.php -->
<?php
require_once 'config/auth.php';
?>

<H1>Test Enregistrement</H1>

id : <?= $résultat->id ?> <BR>
nomEntreprise <?= $résultat->nomEntreprise ?> <BR>
adresse : <?= $résultat->adresse ?> <BR>
adresse2 : <?= $résultat->adresse2 ?> <BR>
ville : <?= $résultat->ville ?> <BR>
tel : <?= $résultat->tel ?> <BR>
codePostal :<?= $résultat->codePostal ?> <BR>
dep_geo : <?= $résultat->dep_geo ?> <BR>
siret : <?= $résultat->siret ?> <BR>
naf : <?= $résultat->naf ?> <BR>
effectif : <?= $résultat->effectif ?> <BR>
Created_UserID : <?= $résultat->Created_UserID ?> <BR>
Created_Date : <?= $résultat->Created_Date ?> <BR>

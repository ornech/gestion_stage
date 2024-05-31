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
<h3 class="title is-4 has-text-centered green-line-bottom mb-4">Details de stage de <?= $stage->EtudiantNom ?> <?=$stage ->EtudiantPrenom?></h3>

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
                    <p class="card-text">Mail: <strong><?= $Profil->email ? $Profil->email : "Non défini" ?></strong> </p>
                    <p class="card-text">Téléphone: <strong><?= $Profil->login ? $Profil->login : "Non défini" ?></strong> </p>
                    <p class="card-text">Groupe: <strong><?= $Profil->classe ?></strong> </p>
                    <p class="card-text">Statut: <strong><?= $Profil->statut ? $Profil->statut : "Non défini"  ?></strong> </p>
                    <p class="card-text">Promotion: <strong><?= $Profil->promo ? $Profil->promo : "Non défini"  ?></strong> </p>
                    <p class="card-text">Spécialité: <strong><?= $Profil->spe ? $Profil->spe : "Non défini"  ?></strong> </p>
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
<p class="card-text">Adresse: <strong><?= $ficheEntreprise->adresse ?></strong> </p>
<p class="card-text">Ville: <strong><?= $ficheEntreprise->ville ? $ficheEntreprise->ville : "Non défini"  ?></strong> </p>
<p class="card-text">Code postal: <strong><?= $ficheEntreprise->codePostal ? $ficheEntreprise->codePostal  : "Non défini" ?></strong> </p>
<p class="card-text">Effectif: <strong><?=$ficheEntreprise->effectif ? $ficheEntreprise->effectif  : "Non défini" ?></strong> </p>
<p class="card-text">Type: _____<strong><?=$ficheEntreprise->naf ? $ficheEntreprise->naf  : "Non défini" ?></strong> </p>


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
            <p class="card-text">Mail: <strong><?= $contacts->email ?></strong> </p>
            <p class="card-text">Téléphone: <strong><?= $contacts->telephone ?></strong> </p>
<br>
            <h4 class="title is-5 has-text-centered yellow-line-bottom mb-4">Details de stage</h3>
            <p class="card-text">Debut:  <strong><?= $stage->dateDebut ?></strong> </p>
            <p class="card-text">Fin:  <strong><?= $stage->dateFin ?></strong> </p>
            <p class="card-text">Professeur assigné: <strong></strong> </p>

                </div>
        </div>
 </div></div>

</body>
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

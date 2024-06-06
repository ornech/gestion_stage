<?php
require_once 'config/auth.php';

if(($_GET["page"] == "view_profil" && $_SESSION['statut'] == "Professeur") || $_GET["page"] == "profil") {

// Vérifier si les détails du profil sont disponibles
if($Profil) {
// Afficher les détails du profi

$userPoints = $profilModel->getPointByUser($Profil->id);
if(isset($userPoints->points)) {
    $userPoints = $userPoints->points;
}else{
    $userPoints = 0;
}
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
    }
    .orange-line-bottom {
        border-bottom: 2px solid orange;
    }
</style>

<div class="container">
    <div class="columns">
        <div class="column is-one-third">
            <div class="box">
                <div class="card-content">
                    <div class="content">
                        <h3 class="title is-4 has-text-centered blue-line-bottom mb-4">Le profil de <?= $Profil->nom ?></h3>
                        <p class="card-text">Nom: <strong><?= $Profil->nom ?></strong> </p>
                        <p class="card-text">Prénom: <strong><?= $Profil->prenom ?></strong> </p>
                        <p class="card-text">Mail: <strong><?= $Profil->email ? $Profil->email : "Non défini" ?></strong> </p>
                        <p class="card-text">Login: <strong><?= $Profil->login ? $Profil->login : "Non défini" ?></strong> </p>
                        <p class="card-text">Groupe: <strong><?= $Profil->classe ?></strong> </p>
                        <p class="card-text">Statut: <strong><?= $Profil->statut ? $Profil->statut : "Non défini"  ?></strong> </p>
                        <p class="card-text">Promotion: <strong><?= $Profil->promo ? $Profil->promo : "Non défini"  ?></strong> </p>
                        <p class="card-text">Spécialité: <strong><?= $Profil->spe ? $Profil->spe : "Non défini"  ?></strong> </p>
                        <p class="card-text">Points d'activité obtenu : <strong><?= $userPoints ?></strong> </p>
                        <a href="../router.php?page=<?= $Profil->id != $_SESSION["userID"] ? "edit_profil&id=" . $_SESSION["userID"] : "edit_my_profil" ?>" class="button is-primary mt-4">Modifier</a>
                    </div>
                </div>
            </div>
        </div>

        <?php
            $statut=$Profil->statut;
            if ($statut=='Etudiant'){
        ?>

        <div class="column is-two-third">
            <div class="box"  style="display: flex; flex-direction: column; height: 100%;">
                <h3 class="title is-4 has-text-centered orange-line-bottom">Stages effectuées</h3>
                <?php if (isset($stages[0])) {
                    foreach ($stages as $stage) {?>

                <table class="table is-fullwidth tableFilter" id="maTable">
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
<?php }else {
   // Si aucun profil n'a été trouvée, afficher un message d'erreur
   echo "<p>Aucun profil trouvé avec ce lien.</p>";
}

}else{
   header("Location: ../router.php?page=profil");
}//Fin de la vérification de si l'utilisateur est connecté en tant que prof

?>

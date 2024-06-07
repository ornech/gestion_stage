<?php
require_once 'config/auth.php';

if(($_GET["page"] == "view_profil" && $_SESSION['statut'] == "Professeur") || $_GET["page"] == "profil") {

// Vérifier si les détails du profil sont disponibles
if($Profil) {
// Afficher les détails du profi

$userPoints = $profilModel->getPointByUser($Profil->id);
$tuteurs = $profilModel->list_by_professeur();
// $table_name = 'user';
// $id=$Profil->id;
// $idTuteur=$Profil->idTuteur;
// function modif_tuteur($id, $idTuteur){
//     $sql = "UPDATE " . $this->table_name . " SET idTuteur = :idTuteur WHERE id = :id";
//     $stmt = $this->conn->prepare($sql);
    
//     $idTuteur = htmlspecialchars(strip_tags($idTuteur));
//     $id = htmlspecialchars(strip_tags($id));

//     $stmt->bindParam(":id", $id);
//     $stmt->bindParam(":idTuteur", $idTuteur);

//     if ($stmt->execute()) {
//         return true;
//     } else {
//         echo "SQL Error: " . implode(", ", $stmt->errorInfo());
//         return false; 
//     }
// }


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
                <div class="card-content">
                    <div class="content">
                        <h3 class="title is-4 has-text-centered blue-line-bottom mb-4">Le profil de <?= $Profil->nom ?></h3>
                        <p class="card-text">Nom: <strong><?= $Profil->nom ?></strong> </p>
                        <p class="card-text">Prénom: <strong><?= $Profil->prenom ?></strong> </p>
                        <p class="card-text">Mail: <strong><?= $Profil->email ? $Profil->email : "Non défini" ?></strong> </p>
                        <p class="card-text">Login: <strong><?= $Profil->login ? $Profil->login : "Non défini" ?></strong> </p>
                        <p class="card-text">Statut: <strong><?= $Profil->statut ? $Profil->statut : "Non défini"  ?></strong> </p>
                        
 <!-- ---------------QUE POUR LES PROFILS DES ETUDIANTS-----------------  -->
                        <?php if($Profil->statut=='Etudiant'){?>

                            <p class="card-text">Groupe: <strong><?= $Profil->classe ?></strong> </p>
                            <p class="card-text">Promotion: <strong><?= $Profil->promo ? $Profil->promo : "Non défini"  ?></strong> </p>
                            <p class="card-text">Spécialité: <strong><?= $Profil->spe ? $Profil->spe : "Non défini"  ?></strong> </p>



                      
                            <?php if ($_SESSION['statut'] == "Professeur") { ?>
<form id="tuteurForm" method="post">
    <p class="card-text">
        <div class="is-grouped">
            Tuteur:
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
<script>
    document.getElementById('selectTuteur').addEventListener('change', function() {
        document.getElementById('tuteurForm').submit();
    });
</script>
<?php } 

//---------------------- la partie si le session c'est un etudiant --> //echo '<script>window.location.reload();</script>';
else {  ?>
    <div class = "is-grouped">
    Tuteur:
<?php    if (!isset ($Profil->idTuteur)){
        echo '<strong> Aucun professeur assigné</strong>'; 
    }
    elseif (isset ($Profil->idTuteur)){
     foreach ($tuteurs as $tuteur) { 
        if (isset($Profil->idTuteur) && $Profil->idTuteur == $tuteur->id) { 
        echo "<strong> $tuteur->nom $tuteur->prenom</strong>";
                           }} 
                         } 
    else {
    echo '';
                           } 
                        
                   }}
                   ?>
                   
     </p>



                        <p class="card-text">Points d'activité obtenu : <strong><?= $userPoints ?></strong> </p>
                        <a href="../router.php?page=<?= $Profil->id != $_SESSION["userID"] ? "edit_profil&id=" . $_SESSION["userID"] : "edit_my_profil" ?>" class="button is-primary mt-4">Modifier</a>
                        <?php if($_SESSION['statut'] == "Professeur" && $Profil->statut != "Professeur"):?><button class="button is-danger mt-4" id="suppressButton">Supprimer</button><?php endif;?>
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

<?php if($_SESSION['statut'] == "Professeur" && $Profil->statut != "Professeur"):?>

<div class="modal is-active">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Êtes-vous sûr(e) ?</p>
            <button class="delete cancel" aria-label="close"></button>
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
                <button class="button cancel">Annuler</button>
                <button class="button is-danger" id="accept" disabled>Confirmer la suppression</button>
            </div>
        </footer>
    </div>
</div>
<script>
    document.getElementById("suppressButton").addEventListener("click", function() {
        document.querySelector(".modal").classList.add("is-active");
    });

    document.querySelectorAll(".cancel").forEach(function(element) {
        element.addEventListener("click", function() {
            document.querySelector(".modal").classList.remove("is-active");
        });
    });

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




<?php }else {
   // Si aucun profil n'a été trouvée, afficher un message d'erreur
   echo "<p>Aucun profil trouvé avec ce lien.</p>";
}

}else{
   header("Location: ../router.php?page=profil");
}//Fin de la vérification de si l'utilisateur est connecté en tant que prof
?>
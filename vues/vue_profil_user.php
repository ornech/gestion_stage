<?php
require_once 'config/auth.php';

if(($_GET["page"] == "view_profil" && $_SESSION['statut'] == "Professeur") || $_GET["page"] == "profil") {

// Vérifier si les détails du profil sont disponibles
if($Profil) {
// Afficher les détails du profi
?>

<h2> Le profil de <?= $Profil->nom ?></h2>

<p><strong>Nom: </strong> <?= $Profil->nom ?></p>
<p><strong>Prénom: </strong> <?= $Profil->prenom ?></p>
<p><strong>Mail: </strong> <?= $Profil->email ? $Profil->email : "Non défini" ?></p>
<p><strong>Login: </strong> <?= $Profil->login ? $Profil->login : "Non défini" ?></p>
<p><strong>Statut: </strong> <?= $Profil->statut ? $Profil->statut : "Non défini"  ?></p>
<p><strong>Promotion: </strong> <?= $Profil->promo ? $Profil->promo : "Non défini"  ?></p>
<p><strong>Spécialité: </strong> <?= $Profil->spe ? $Profil->spe : "Non défini"  ?></p>
<p><?= $Profil->$group ?></p>
<?php
} else {
   // Si aucun profil n'a été trouvée, afficher un message d'erreur
   echo "<p>Aucun profil trouvé avec ce lien.</p>";
}

}else{
   header("Location: ../router.php?page=profil");
}//Fin de la vérification de si l'utilisateur est connecté en tant que prof


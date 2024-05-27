<?php
require_once 'config/auth.php';

if(($_GET["page"] == "view_profil" && $_SESSION['statut'] == "Professeur") || $_GET["page"] == "profil") {
    
// Vérifier si les détails du profil sont disponibles
if($Profil) {
// Afficher les détails du profi
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

    </style>

<body>
<div class="container">
        <div class="card">
            <div class="card-content">
                <div class="content">
                <h2 class="title is-2 has-text-centered blue-line-bottom mb-4">Le profil de <?= $Profil->nom ?></h2>
    <p class="card-text">Nom: <strong><?= $Profil->nom ?></strong> </p>
    <p class="card-text">Prénom: <strong><?= $Profil->prenom ?></strong> </p>
    <p class="card-text">Mail: <strong><?= $Profil->email ? $Profil->email : "Non défini" ?></strong> </p>
    <p class="card-text">Login: <strong><?= $Profil->login ? $Profil->login : "Non défini" ?></strong> </p>
    <p class="card-text">Groupe: <strong><?= $Profil->classe ?></strong> </p>
    <p class="card-text">Statut: <strong><?= $Profil->statut ? $Profil->statut : "Non défini"  ?></strong> </p>
    <p class="card-text">Promotion: <strong><?= $Profil->promo ? $Profil->promo : "Non défini"  ?></strong> </p>
    <p class="card-text">Spécialité: <strong><?= $Profil->spe ? $Profil->spe : "Non défini"  ?></strong> </p>
</div>
  </div>
  </div>
</div>
</body>

<?php
} else {
   // Si aucun profil n'a été trouvée, afficher un message d'erreur
   echo "<p>Aucun profil trouvé avec ce lien.</p>";
}

}else{
   header("Location: ../router.php?page=profil");
}//Fin de la vérification de si l'utilisateur est connecté en tant que prof

?>


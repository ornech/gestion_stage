<?php
// Initialiser la session
session_start();

// Vérifier si l'utilisateur est connecté, sinon le rediriger vers la page de connexion
//if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//    header('Location: login.php');
//    exit;
//}

// Inclure la connexion à la base de données
require_once('config/db_connection.php');
require_once('config/auth.php');


// Définir les variables et les initialiser avec des valeurs vides
$new_password = $confirm_password = '';
$new_password_err = $confirm_password_err = '';

// Traitement du formulaire lorsque le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Valider le nouveau mot de passe
    if (empty(trim($_POST['new_password']))) {
        $new_password_err = 'Veuillez entrer un nouveau mot de passe.';
    } elseif (strlen(trim($_POST['new_password'])) < 6) {
        $new_password_err = 'Le mot de passe doit contenir au moins 6 caractères.';
    } else {
        $new_password = trim($_POST['new_password']);
    }

    // Valider la confirmation du mot de passe
    if (empty(trim($_POST['confirm_password']))) {
        $confirm_password_err = 'Veuillez confirmer le mot de passe.';
    } else {
        $confirm_password = trim($_POST['confirm_password']);
        if ($new_password != $confirm_password) {
            $confirm_password_err = 'Les mots de passe ne correspondent pas.';
        }
    }

    // Vérifier s'il n'y a pas d'erreurs de saisie avant de mettre à jour la base de données
    if (empty($new_password_err) && empty($confirm_password_err)) {
        try {
            // Préparer une instruction de mise à jour
            $sql = "UPDATE User SET password = :password , password_reset = '0' WHERE id = :id";

            $stmt = $conn->prepare($sql);

            // Liaison des paramètres
            $stmt->bindParam(':password', $param_password, PDO::PARAM_STR);
            $stmt->bindParam(':id', $_SESSION['userID'], PDO::PARAM_INT);

            // Paramétrer les paramètres
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Exécution de la déclaration préparée
            if ($stmt->execute()) {
                // Rediriger l'utilisateur vers la page d'index
                //$stmt->debugDumpParams();
                //echo "<BR>";
                header('Location: index.php');
                exit;
            } else {
                echo 'Quelque chose s\'est mal passé. Veuillez réessayer plus tard.';
            }
        } catch (PDOException $e) {
            $stmt->debugDumpParams();
            echo "<BR>";
            echo 'Erreur : ' . $e->getMessage();
            echo "<BR>";
            echo var_dump($_SESSION);
            echo "<BR>";

        }

        // Fermer la déclaration
        unset($stmt);
    }

    // Fermer la connexion
    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/sign-in.css" rel="stylesheet">
    <link href="css/floating-labels.css" rel="stylesheet">

    <title>Application gestion stage</title>
</head>
<body>
<main class="form-signin w-100 m-auto">

  <svg width="100%" height="125" xmlns="http://www.w3.org/2000/svg">
    <!-- Dégradé pour simuler l'eau -->
    <defs>
    <linearGradient id="waterGradient" x1="0%" y1="0%" x2="100%" y2="0%">
       <stop offset="0%" style="stop-color:#cccccc;stop-opacity:1" />
        <stop offset="100%" style="stop-color:#cccccc;stop-opacity:1" />
      </radialGradient>
    </defs>

    <!-- Flaque d'eau -->
    <rect x="0" y="0" width="400" height="200" fill="url(#waterGradient)" />

    <!-- Cercles concentriques animés -->
    <circle cx="80" cy="120" r="5" fill="none" stroke="#FFFFFF" stroke-width="2">
      <animate attributeName="r" from="5" to="100" dur="5s" repeatCount="indefinite" />
      <animate attributeName="stroke-opacity" from="1" to="0" dur="5s" repeatCount="indefinite" />
    </circle>

    <circle cx="200" cy="80" r="10" fill="none" stroke="#FFFFFF" stroke-width="2">
      <animate attributeName="r" from="10" to="100" dur="6s" repeatCount="indefinite" />
      <animate attributeName="stroke-opacity" from="1" to="0" dur="6s" repeatCount="indefinite" />
    </circle>

    <circle cx="320" cy="150" r="15" fill="none" stroke="#FFFFFF" stroke-width="2">
      <animate attributeName="r" from="15" to="100" dur="7s" repeatCount="indefinite" />
      <animate attributeName="stroke-opacity" from="1" to="0" dur="7s" repeatCount="indefinite" />
    </circle>

    <!-- Ajout de deux autres cercles -->
    <circle cx="140" cy="40" r="8" fill="none" stroke="#FFFFFF" stroke-width="2">
      <animate attributeName="r" from="8" to="100" dur="8s" repeatCount="indefinite" />
      <animate attributeName="stroke-opacity" from="1" to="0" dur="8s" repeatCount="indefinite" />
    </circle>

    <circle cx="260" cy="160" r="12" fill="none" stroke="#FFFFFF" stroke-width="2">
      <animate attributeName="r" from="12" to="100" dur="9s" repeatCount="indefinite" />
      <animate attributeName="stroke-opacity" from="1" to="0" dur="9s" repeatCount="indefinite" />
    </circle>

    <!-- Texte -->
    <text x="50%" y="35%" dominant-baseline="middle" text-anchor="middle" font-family="Arial" font-size="42" fill="black" text-transform="uppercase" style="text-align: center; white-space: nowrap; font-weight: bold;">GESTION</text>
   <text x="50%" y="65%" dominant-baseline="middle" text-anchor="middle" font-family="Arial" font-size="36" fill="black" text-transform="uppercase" style="text-align: center; white-space: nowrap; font-weight: bold;">DE STAGE</text>
  </svg>


  <div class="wrapper">
         <h2>Nouveau mot de passe</h2>
         <p>Remplissez ce formulaire pour changer votre mot de passe.</p>
         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
             <div class="form-group ">
                 <label class="control-label">Nouveau Mot de passe</label>
                 <input type="password" class="form-control input-md" name="new_password" value="<?php echo $new_password; ?>">
                 <span><?php echo $new_password_err; ?></span>
             </div>
             <div class="form-group ">
                 <label class="control-label">Confirmer le mot de passe</label>
                 <input type="password" class="form-control input-md" name="confirm_password">
                 <span><?php echo $confirm_password_err; ?></span>
             </div>
             <div class="form-group ">
                 <input class="btn btn-primary w-100 py-2" type="submit" value="Valider">
             </div>
         </form>
     </div>

</main>

</body>
</html>

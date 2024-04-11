<?php
// Démarrer la session
session_start();


// Inclure le fichier de connexion à la base de données
require_once 'config/db_connection.php';

// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les informations soumises par le formulaire
    $login = $_POST['login'];
    $password = $_POST['password'];

    try {
        // Préparer la requête SQL pour récupérer l'utilisateur avec le nom d'utilisateur (login) fourni
        $stmt = $conn->prepare("SELECT * FROM User WHERE login = :login");
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier si un utilisateur correspondant a été trouvé
        if ($user) {
            // Vérifier si le mot de passe correspond
            if (sha1($password) === $user['password']) { // Vous devez utiliser le même algorithme de hachage que celui utilisé pour stocker les mots de passe dans la base de données
                // Authentification réussie, créer une session utilisateur
                $_SESSION['username'] = $user['login']; // Stocker le nom d'utilisateur dans la session
                $_SESSION['statut'] = $user['statut']; // Stocker le statut dans la session

                // Rediriger l'utilisateur vers une page sécurisée ou la page d'accueil
                header("Location: index.php");
                exit;
            } else {
                // Mot de passe incorrect, afficher un message d'erreur
                $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
            }
        } else {
            // Aucun utilisateur trouvé avec ce nom d'utilisateur, afficher un message d'erreur
            $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } catch(PDOException $e) {
        // Afficher le message d'erreur PDO
        echo "Erreur de connexion à la base de données: " . $e->getMessage();
    }
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

    <title>Appication gestion stage</title>
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













  <form  action="" method="post">
    <fieldset>
      <?php if (isset($error_message)) : ?>
       <div class="form-group">
          <div class="alert alert-danger d-flex align-items-center" role="alert">
             &nbsp; <?php echo $error_message; ?>
        </div>
       </div>
      <?php endif; ?>

        <!-- Form Name -->
        <legend>Connexion</legend>
        <div class="form-group ">
            <label class="control-label" for="login">Utilisateur</label>
            <input id="login" name="login" class="form-control input-md" type="text">
        </div>
        <!-- Text input-->
        <div class="form-group">
            <label class="control-label" for="password"> Mot de passe</label>
            <input id="password" name="password" class="form-control input-md" type="password">
        </div>

        <div class="form-group">
            <input class="btn btn-primary w-100 py-2 " type="submit" value="Connection">
        </div>
    </fieldset>

    <p class="text-body-secondary" align="center">BTS SIO - Lycée Merleau Ponty</p>
  </form>
</main>
<script src="js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

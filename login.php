<?php
session_start();

// Inclure le fichier de configuration pour la connexion SQL
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


<!--
    <form action="" method="post">
        <label for="login">Nom d'utilisateur:</label><br>
        <input type="text" id="login" name="login" required><br>
        <label for="password">Mot de passe:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Se connecter">
    </form>
  -->
  <main class="form-signin w-100 m-auto">
  <form  action="" method="post">

    <h1 class="h3 mb-3 fw-normal" align="center">Merci de vous authentifier</h1>

    <?php if (isset($error_message)) : ?>
     <div class="form-floating">
        <div class="alert alert-danger d-flex align-items-center" role="alert">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"></path>
          </svg> &nbsp; <?php echo $error_message; ?>
      </div>
     </div>
    <?php endif; ?>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput"  name="login" required>
      <label for="floatingInput">Utilisateur</label>
    </div>

    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" required>
      <label for="floatingPassword">Mot de passe</label>
    </div>

    <div class="form-floating">
     <input class="btn btn-primary w-100 py-2 " type="submit" value="Connection">
    </div>

    <p class="text-body-secondary" align="center">BTS SIO - Lycée Merleau Ponty</p>
  </form>
</main>
<script src="js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

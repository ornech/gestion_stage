<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="css/sign-in.css" rel="stylesheet">
    <link href="css/floating-labels.css" rel="stylesheet">

    <title>Application gestion stage</title>
</head>
<body>
<main>

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

            }
            // Vérifier si le mot de passe correspond
            //if ($login == $user['login'] && $user['inactif'] == 0) {
            if (password_verify($password, $user['password']) && $login == $user['login'] && $user['inactif'] == 0) {
                // Authentification réussie, créer une session utilisateur
                $_SESSION['username'] = $user['login']; // Stocker le nom d'utilisateur dans la session
                $_SESSION['statut'] = $user['statut']; // Stocker le statut dans la session
                $_SESSION['utilisateur'] = $user['nom'] . " " . $user['prenom'];
                $_SESSION['userID'] = $user['id'];

                if ($user['password_reset']==1 ) {
                  // TODO : A compléter
                  header("Location: password_reset.php?login=" . $user['id'] . "");

                }
                else {
                  // Rediriger l'utilisateur vers une page sécurisée ou la page d'accueil
                  header("Location: index.php");
                  exit;
                }
              }

            if ($user['inactif'] == 1) {
              $error_message = "Ce compte est désactivé, veuillez compter un administrateur pour dévérrouiller ce compte.";
              exit;
              }
            else {
                // Mot de passe incorrect, afficher un message d'erreur
                $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
            }

    } catch(PDOException $e) {
        // Afficher le message d'erreur PDO
        echo "Erreur de connexion à la base de données: " . $e->getMessage();
    }
}

?>

<form class="box" action="" method="post">
    <fieldset>
      <?php if
       (isset($error_message)) : ?>
       <div class="field">
          <div class="notification is-danger">
             <?php echo $error_message; ?>
          </div>
       </div>
      <?php endif; ?>

      <!-- Form Name -->
      <legend>Connexion</legend>

      <div class="field">
        <div class="control has-icons-left">
          <input id="login" name="login" class="input" type="text" placeholder="Utilisateur">
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </div>
      </div>

      <div class="field">
        <div class="control has-icons-left">
          <input id="password" name="password" class="input" type="password" placeholder="Mot de passe">
          <span class="icon is-small is-left">
            <i class="fas fa-lock"></i>
          </span>
        </div>
      </div>

      <div class="field">
        <div class="control">
          <button class="button is-success is-fullwidth" type="submit" value="Connection">Connection</button>
        </div>
      </div>

    </fieldset>

    <br>
    <p class="has-text-centered"><strong>BTS SIO</strong> - Lycée Merleau Ponty</p>
  </form>

</main>
</body>
</html>

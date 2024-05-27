<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="js/theme.js"></script>

  <title>Application gestion stage</title>
</head>

<body>
  <main>

  <style>
    .button-flying {
      position: absolute;
      bottom: 40%;
      right: 20%;
    }
  </style>


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

          if ($user['password_reset'] == 1) {
            // TODO : A compléter
            header("Location: password_reset.php?login=" . $user['id'] . "");
          } else {
            // Rediriger l'utilisateur vers une page sécurisée ou la page d'accueil
            header("Location: index.php");
            exit;
          }
        }

        if ($user['inactif'] == 1) {
          $error_message = "Ce compte est désactivé, veuillez compter un administrateur pour dévérrouiller ce compte.";
          exit;
        } else {
          // Mot de passe incorrect, afficher un message d'erreur
          $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
        }
      } catch (PDOException $e) {
        // Afficher le message d'erreur PDO
        echo "Erreur de connexion à la base de données: " . $e->getMessage();
      }
    }

    ?>

    <div class="columns is-centered" style="height: 100vh; align-items: center;">
      <div class="column is-one-quarter">

        <form class="box container" action="" method="post" style="outline: 1px; outline-color: #1d213b;">

          <svg xmlns="http://www.w3.org/2000/svg" viewBox="50 50 412 412">
            <!-- Noyau central -->
            <linearGradient id="centerGradient" gradientUnits="userSpaceOnUse" x1="204" y1="250" x2="308" y2="250">
              <stop offset="0" style="stop-color:#3273dc" />
              <stop offset="1" style="stop-color:#3273dc" />
            </linearGradient>
            <circle cx="256" cy="256" r="30" style="fill:url(#centerGradient)" />

            <!-- Orbite 1 -->
            <linearGradient id="orbit1Gradient" gradientUnits="userSpaceOnUse" x1="49.64" y1="250" x2="474.36" y2="250">
              <stop offset="0" style="stop-color:#3273dc" />
              <stop offset="1" style="stop-color:#3273dc" />
            </linearGradient>
            <circle cx="256" cy="256" r="80" style="fill:none;stroke:url(#orbit1Gradient);stroke-width:2;stroke-miterlimit:10" />
            <circle cx="336" cy="256" r="12" style="fill:url(#orbit1Gradient)">
              <animateTransform attributeName="transform" attributeType="XML" type="rotate" from="0 256 256" to="360 256 256" dur="3s" repeatCount="indefinite" />
            </circle>

            <!-- Orbite 2 -->
            <linearGradient id="orbit2Gradient" gradientUnits="userSpaceOnUse" x1="49.64" y1="250" x2="474.36" y2="250">
              <stop offset="0" style="stop-color:#3273dc" />
              <stop offset="1" style="stop-color:#3273dc" />
            </linearGradient>
            <circle cx="256" cy="256" r="140" style="fill:none;stroke:url(#orbit2Gradient);stroke-width:2;stroke-miterlimit:10" />
            <circle cx="396" cy="256" r="9" style="fill:url(#orbit2Gradient)">
              <animateTransform attributeName="transform" attributeType="XML" type="rotate" from="0 256 256" to="360 256 256" dur="10s" repeatCount="indefinite" />
            </circle>
          </svg>

          <fieldset>
            <?php if (isset($error_message)) : ?>
              <div class="field">
                <div class="notification is-danger">
                  <?php echo $error_message; ?>
                </div>
              </div>
            <?php endif; ?>
            <BR>

            <!--   <legend class="">Connexion</legend> -->


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
                <button class="button is-link is-fullwidth" type="submit" value="Connection">Connection</button>
              </div>
            </div>

          </fieldset>

          <br>
          <p class="has-text-centered"><strong>BTS SIO</strong> - Lycée Merleau Ponty</p>
        </form>
      </div>
    </div>
  </main>
</body>

</html>
<!-- Version validé de login.php -->
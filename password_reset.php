<?php
// Initialiser la session
session_start();

$table_name = "user";

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
            $sql = "UPDATE $table_name SET password = :password , password_reset = '0' WHERE id = :id";

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="js/theme.js"></script>

    <title>Application gestion stage</title>
</head>
<body>
<main>

<div class="columns is-centered" style="height: 100vh; align-items: center;">
    <div class="column is-one-third">

        <form class="box container" action="" method="post">
            <fieldset>

            <!-- Form Name -->
            <legend class="is-size-3 mb-1">Nouveau mot de passe</legend>
            <p class="is-size-6 mb-4">Remplissez ce formulaire pour changer votre mot de passe.</p>

            <div class="field">
                <div class="control has-icons-left">
                    <input id="password" name="new_password" class="input" type="password" placeholder="Mot de passe">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <div class="control has-icons-left">
                    <input id="confirm_password" name="confirm_password" class="input" type="password" placeholder="Confirmer le mot de passe">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
            </div>
            

            <?php if($new_password_err != ""):?>
              <div class="field">
                <div class="notification is-danger">
                  <p>Erreur : <?=$new_password_err?></p>
                </div>
              </div>
            <?php elseif($confirm_password_err != ""):?>
              <div class="field">
                <div class="notification is-danger">
                  <p>Erreur : <?=$confirm_password_err?></p>
                </div>
              </div>
            <?php endif; ?>

            <div class="field">
                <div class="control">
                    <button class="button is-success is-fullwidth" type="submit" value="Confirmer">Confirmer</button>
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

<!-- Version validé de password_reset.php -->
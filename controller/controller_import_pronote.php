<?php
// Démarrer la session en premier
session_start();

// Vérifie si l'utilisateur est connecté
require_once '../config/auth.php';
require_once '../config/db_connection.php';
require_once '../model/Profil.php';

// Fonction pour enlever les accents
function removeAccents($str) {
    $unwanted_array = array(
        'à' => 'a', 'â' => 'a', 'ä' => 'a', 'á' => 'a', 'ã' => 'a', 'å' => 'a', 'ā' => 'a',
        'ç' => 'c', 'ć' => 'c', 'č' => 'c',
        'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ē' => 'e', 'ė' => 'e', 'ę' => 'e',
        'î' => 'i', 'ï' => 'i', 'í' => 'i', 'ī' => 'i', 'į' => 'i',
        'ł' => 'l',
        'ñ' => 'n', 'ń' => 'n',
        'ô' => 'o', 'ö' => 'o', 'ò' => 'o', 'ó' => 'o', 'õ' => 'o', 'ø' => 'o', 'ō' => 'o',
        'š' => 's', 'ś' => 's',
        'û' => 'u', 'ü' => 'u', 'ù' => 'u', 'ú' => 'u', 'ū' => 'u',
        'ÿ' => 'y', 'ý' => 'y',
        'ž' => 'z', 'ź' => 'z', 'ż' => 'z',
        'À' => 'A', 'Â' => 'A', 'Ä' => 'A', 'Á' => 'A', 'Ã' => 'A', 'Å' => 'A', 'Ā' => 'A',
        'Ç' => 'C', 'Ć' => 'C', 'Č' => 'C',
        'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ē' => 'E', 'Ė' => 'E', 'Ę' => 'E',
        'Î' => 'I', 'Ï' => 'I', 'Í' => 'I', 'Ī' => 'I', 'Į' => 'I',
        'Ł' => 'L',
        'Ñ' => 'N', 'Ń' => 'N',
        'Ô' => 'O', 'Ö' => 'O', 'Ò' => 'O', 'Ó' => 'O', 'Õ' => 'O', 'Ø' => 'O', 'Ō' => 'O',
        'Š' => 'S', 'Ś' => 'S',
        'Û' => 'U', 'Ü' => 'U', 'Ù' => 'U', 'Ú' => 'U', 'Ū' => 'U',
        'Ÿ' => 'Y', 'Ý' => 'Y',
        'Ž' => 'Z', 'Ź' => 'Z', 'Ż' => 'Z'
    );
    return strtr($str, $unwanted_array);
}

// Fonction pour isoler le nom et le prénom
function isolerNomPrenom($nom_complet) {
    // Retirer les accents et convertir en minuscules
    $nom_complet = strtolower(removeAccents($nom_complet));

    // Supprimer les tirets et les apostrophes
    $nom_complet = str_replace(['-', '\''], ' ', $nom_complet);

    // Séparer les mots
    $mots = explode(' ', $nom_complet);

    // Le dernier mot est le prénom
    $prenom = array_pop($mots);

    // Les autres mots constituent le nom
    $nom = implode(' ', $mots);

    return ['nom' => $nom, 'prenom' => $prenom];
}

function convertDateFormat($date) {
    // Utiliser DateTime pour convertir le format
    $dateTime = DateTime::createFromFormat('d/m/Y', $date);
    if ($dateTime) {
        return $dateTime->format('Y-m-d');
    } else {
        // Gérer l'erreur si le format de la date est incorrect
        return false;
    }
}

function extractYear($date) {
    // Utiliser DateTime pour analyser la date
    $dateTime = DateTime::createFromFormat('d/m/Y', $date);
    if ($dateTime) {
        // Retourner seulement l'année
        return $dateTime->format('Y');
    } else {
        // Gérer l'erreur si le format de la date est incorrect
        return false;
    }
}
// Fonction pour générer le login
function generateLogin($nom_complet) {
    $resultat = isolerNomPrenom($nom_complet);
    $nom = str_replace(' ', '', $resultat['nom']);
    $prenom = str_replace(' ', '', $resultat['prenom']);
    $login = $nom . '.' . $prenom;
    return strtolower($login);
}

if (isset($_POST['submit'])) {
    // Vérifiez si le fichier a été téléchargé
    if (is_uploaded_file($_FILES['csv_file']['tmp_name'])) {
        // Ouvrir le fichier CSV
        $csvFile = fopen($_FILES['csv_file']['tmp_name'], 'r');

        // Sauter la première ligne (les en-têtes)
        fgetcsv($csvFile, 1000, ";");

        // Parcourir les lignes du fichier CSV
        while (($line = fgetcsv($csvFile, 1000, ";")) !== FALSE) {
            // Test si le nombre de colonnes est correct
            if (count($line) >= 13) {
                $nom_complet = $line[0];
                $resultat = isolerNomPrenom($nom_complet);
                $nom = strtoupper($resultat['nom']);
                $prenom = $resultat['prenom'];
                $date_entree = convertDateFormat($line[4]);
                $spe = ''; // Exemple de spécialité
                $promo = extractYear($date_entree);;
                $login = generateLogin($nom_complet);
                $password = password_hash('achanger', PASSWORD_BCRYPT); // Mot de passe par défaut
                $statut = 'Etudiant';
                $inactif = 0;
                $password_reset = 1;

                // Vérifie si l'étudiant est sorti des effectifs
                if (strlen($line[5]) > 1) {
                    // Si ce champ est rempli, l'étudiant est sorti des effectifs
                    continue; // Passer à la prochaine ligne du CSV
                }

                // Vérifiez si le login existe déjà
                $checkSql = "SELECT COUNT(*) FROM User WHERE login = :login";
                $checkStmt = $conn->prepare($checkSql);
                $checkStmt->bindParam(':login', $login, PDO::PARAM_STR);
                $checkStmt->execute();
                $loginExists = $checkStmt->fetchColumn();

                // Test si le login existe déjà
                if ($loginExists) {
                    continue; // Passer à la prochaine ligne du CSV
                }

                $profil = new Profil($conn);
                if (!$profil->import($nom, $prenom, $spe, $date_entree, $promo, $login, $password, $statut, $inactif, $password_reset)) {
                    $message = "Une erreur s'est produite lors de l'importation du profil : <BR>Nom: $nom <BR >Prénom: $prenom <BR>Spe: $spe<BR>date_entree: $date_entree <BR>promo: $promo<BR>Login: $login<BR>Password: $password<BR>Status: $statut";
                    header("Location: ../router.php?page=erreur&message=" . urlencode($message));
                    exit();
                }
            } else {
                $message = "Le format du fichier CSV est incorrect. Nombre de colonnes attendu : 13, trouvé : " . count($line);
                header("Location: ../router.php?page=erreur&message=" . urlencode($message));
                exit();
            }
        }
        // Fermez le fichier CSV
        fclose($csvFile);
        // Redirige vers la page de gestion des utilisateurs
        header("Location: ../router.php?page=gestion_etu");
    } else {
        $message = "Veuillez télécharger un fichier CSV valide.";
        header("Location: ../router.php?page=erreur&message=" . urlencode($message));
        exit();
    }
} else {
    // Rediriger vers une page d'erreur si le formulaire n'a pas été soumis
    echo "<BR>Le formulaire n'a pas été soumis correctement.";
    exit();
}
?>

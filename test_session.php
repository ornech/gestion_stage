<?php
// Démarrer la session
session_start();

// Vérifier si la variable de session test est définie
if (isset($_SESSION['test'])) {
    echo "La session fonctionne correctement. La variable de session 'test' est définie.";
} else {
    echo "La session ne semble pas fonctionner correctement. La variable de session 'test' n'est pas définie.";
}
?>

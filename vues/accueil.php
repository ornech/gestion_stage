<?php
// Votre code PHP pour récupérer et afficher les issues ici
require_once 'config/auth.php';

// Définition de l'URL de l'API GitHub
$url = 'https://api.github.com/repos/ornech/gestion_stage/issues';

// Définition des en-têtes HTTP
$headers = array(
  'Accept: application/vnd.github+json',
  'Authorization: Bearer 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',
  'X-GitHub-Api-Version: 2022-11-28',
  'User-Agent: My-App' // Remplacez "My-App" par le nom de votre application ou un identifiant approprié
);

// Initialisation de cURL
$curl = curl_init();

// Configuration de cURL
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

// Exécution de la requête cURL
$response = curl_exec($curl);

// Vérification des erreurs
if ($response === false) {
  $error = curl_error($curl);
  echo "Erreur cURL : $error";
} else {
  // Conversion de la réponse en tableau associatif
  $issues = json_decode($response, true);

  echo '<ul class="list-group">';

  // Affichage de chaque issue sous forme de liste Bootstrap
  foreach ($issues as $issue) {
    echo '<li class="list-group-item">';
    // echo htmlspecialchars($issue['html_url']);
    echo htmlspecialchars($issue['title']);
    echo ' <span class="badge badge-pill" style="background-color: #' . $issue["labels"][0]["color"] . ';">' . $issue["labels"][0]["name"] . '</span>';
    // class="btn btn-primary float-right"
    echo '
    <a href="'. htmlspecialchars($issue['html_url']) . '">Voir sur GitHub</a>

    ';

    echo '</li>';

  }
  echo '</ul>';
}

// Fermeture de la session cURL
curl_close($curl);
?>

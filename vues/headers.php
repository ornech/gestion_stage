<?php
require_once 'config/auth.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Application gestion de stages</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Bulma.io -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma-rtl.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">

  <link rel="stylesheet" href="../css/style.css">

  <script src="/js/trie_tableau.js"></script>
  <script src="/js/theme.js"></script>

  <!-- Si la vue est une popup, alors intégré ce javascript -->
  <?= str_starts_with($page, "vue_popup") ? "<script src=\"/js/popup.js\"></script>" : "" ?>

</head>
<body>

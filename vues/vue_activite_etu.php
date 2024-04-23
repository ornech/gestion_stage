<?php
require_once 'config/auth.php';
include 'vues/vue_activite_bouton.php';
?>

<style>
table {
  width: 100%;
  border-collapse: collapse;
}
th, td {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
th {
  background-color: #f2f2f2;
}
</style>
</head>
<body>
  <h2>Historique de vos démarches</h2>

  <table id="maTable">
    <thead>
      <tr>
        <th onclick="sortTable(4)">Etudiant </th>
        <th onclick="sortTable(1)"> Type</th>
        <th onclick="sortTable(2)"> Date </th>
        <!--<th onclick="sortTable(3)">Etudiant</th>-->
        <th onclick="sortTable(5)">Entreprise </th>
        <th onclick="sortTable(6)">Ville </th>
        <th onclick="sortTable(6)">Commentaire </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($ActiviteEtudiant as $activites): ?>
        <tr>
          <td><?php
          if ($activites->Type == "email"){echo "<i class='fa fa-at'></i>";}
          if ($activites->Type == "tel"){echo "<i class='fa fa-phone'></i>";}

          ?></td>
          <td><?= $activites->Date ?></td>
          <td><?= $activites->Heure ?></td>
          <!-- <td><?= $activites->Etudiant ?></td>-->
          <td><a href="router.php?page=fiche_entreprise&idEntreprise=<?= $activites->IdEntreprise ?>"><?= $activites->Entreprise ?></a></td>
          <td><?= $activites->Ville ?></td>
          <td><?= $activites->Commentaire ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

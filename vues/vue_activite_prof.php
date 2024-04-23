<?php
require_once 'config/auth.php';
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
  <h2>Historique des démarches</h2>

  <table id="maTable">
    <thead>
      <tr>
        <th> Date </th>
        <th onclick="sortTable(1)">Etudiant</th>
        <th onclick="sortTable(2)">Type </th>
        <th onclick="sortTable(3)">Date</th>
        <th onclick="sortTable(4)">Entreprise</th>
        <th onclick="sortTable(4)">Ville</th>
        <th onclick="sortTable(4)">Détails</th>


      </tr>
    </thead>
    <tbody>
      <?php foreach ($ActiviteEtudiant as $activites): ?>
        <tr>
          <td><?= $activites->Etudiant ?></td>
          <td><?php
          if ($activites->Type == "email"){echo "<i class='fa fa-at'></i>";}
          if ($activites->Type == "tel"){echo "<i class='fa fa-phone'></i>";}

          ?></td>
          <td><?= $activites->Date ?></td>
          <td><a href="router.php?page=fiche_entreprise&idEntreprise=<?= $activites->IdEntreprise ?>"><?= $activites->Entreprise ?></a></td>

          <td><?= $activites->Entreprise ?></td>
          <td><?= $activites->Ville ?></td>
          <td><a type="button" href="router.php?page=activité_detail&idActivité=<?= $activites->Id ?>">Détails</a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

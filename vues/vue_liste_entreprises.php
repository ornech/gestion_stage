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
    <h1>Liste des entreprises</h1>

    <table id="maTable">
        <thead>
            <tr>
              <th>Nom <button onclick="sortTable(0)">&#8645;</button> </th>
              <th onclick="sortTable(1)">Adresse</th>
              <th onclick="sortTable(2)">Ville <button onclick="sortTable(2)">&#8645;</button></th>
              <th onclick="sortTable(3)">Téléphone</th>
              <th onclick="sortTable(4)">Code Postal <button onclick="sortTable(4)">&#8645;</button> </th>
              <th onclick="sortTable(5)">Indice &#8645;</th>
              <th></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entreprises as $entreprise): ?>
                <tr>
                    <td><?= $entreprise->nomEntreprise ?></td>
                    <td><?= $entreprise->adresse ?></td>
                    <td><?= $entreprise->ville ?></td>
                    <td><?= $entreprise->tel ?></td>
                    <td><?= $entreprise->codePostal ?></td>
                    <td><?= $entreprise->indice_fiabilite ?></td>
                    <td>
                      <a href="router.php?page=modifier_entreprise&idEntreprise=<?= $entreprise->id ?>">Modifier</a> &nbsp;
                      <a href="router.php?page=fiche_entreprise&idEntreprise=<?= $entreprise->id ?>">voir </a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

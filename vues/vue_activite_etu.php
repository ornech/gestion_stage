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
              <th> Date </th>
              <th onclick="sortTable(1)"> Etudiant</th>
              <th onclick="sortTable(2)">type </th>
              <th onclick="sortTable(3)">ID_Entreprise</th>
              <th onclick="sortTable(4)">Commentaire </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ActiviteEtudiant as $activites): ?>
                <tr>
                    <td><?= $activites->date ?></td>
                    <td><?= $activites->IdEtudiant ?></td>
                    <td><?= $activites->type ?></td>
                    <td><?= $activites->ID_Entreprise ?></td>
                    <td><?= $activites->Commentaire ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

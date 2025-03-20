<?php
require_once 'config/auth.php';
?></td>


?>
<H1> Liste des contats</H1>
<table class="table tableFilter">
    <thead>
        <tr>
            <th>Contact</th>
            <th>Email</th>
            <th>Entreprise</th>
            <th>Jury</th>

        </tr>
    </thead>
    <?php foreach ($contacts as $contact) {
        if ($contact->email === "") continue;
    ?>
        <TR>
            <td><?= $contact->nom != null ? htmlspecialchars($contact->nom) : "-" ?> <?= $contact->prenom != null ? htmlspecialchars($contact->prenom) : "Non défini" ?></td>
            <td><?= $contact->email != null ? htmlspecialchars($contact->email) : "-"; ?></td>
            <td><?= $contact->entreprise != null ? htmlspecialchars($contact->entreprise) : "-" ?></td>
            <td> <input type="checkbox" name="<?= $contact->EmployeID ?>" id="myCheckbox" <?= $contact->jury == 0 ? 'value="0"' : 'value="1" checked' ?>></td>
            <td>
                <form method="POST" action="controller/contact_jury.php">
                    <input type="hidden" name="EmployeID" value="<?= $contact->EmployeID ?>">
                    <input type="checkbox" name="jury" value="1" <?= $contact->jury == 1 ? 'checked' : '' ?>
                        onchange="this.form.submit();">
                </form>
            </td>

        </TR>

    <?php } ?>
</table>

// -- gestion_stage.contact_employe source

CREATE OR REPLACE
ALGORITHM = UNDEFINED VIEW `gestion_stage`.`contact_employe` AS
select
`gestion_stage`.`employe`.`id` AS `EmployeID`,
`gestion_stage`.`employe`.`nom` AS `nom`,
`gestion_stage`.`employe`.`prenom` AS `prenom`,
`gestion_stage`.`employe`.`email` AS `email`,
`gestion_stage`.`employe`.`telephone` AS `telephone`,
`gestion_stage`.`employe`.`fonction` AS `fonction`,
`gestion_stage`.`employe`.`service` AS `service`,
`gestion_stage`.`entreprise`.`id` AS `EntrepriseID`,
`gestion_stage`.`entreprise`.`nomEntreprise` AS `entreprise`,
`gestion_stage`.`entreprise`.`adresse` AS `Entreprise_adresse`,
`gestion_stage`.`entreprise`.`codePostal` AS `Entreprise_codePostal`,
`gestion_stage`.`entreprise`.`ville` AS `Entreprise_ville`,
`gestion_stage`.`user`.`id` AS `UserID`,
concat(`gestion_stage`.`user`.`nom`, ' ', `gestion_stage`.`user`.`prenom`) AS `Created_User`,
`gestion_stage`.`employe`.`created_date` AS `Created_date`,
`gestion_stage`.`employe`.`contact_valide` AS `contact_valide`,
`gestion_stage`.`employe`.`jury` AS `jury`,
`gestion_stage`.`employe`.`newsletter` AS `newsletter`,

from
((`gestion_stage`.`employe`
join `gestion_stage`.`entreprise` on
(`gestion_stage`.`employe`.`idEntreprise` = `gestion_stage`.`entreprise`.`id`))
join `gestion_stage`.`user` on
(`gestion_stage`.`employe`.`created_userid` = `gestion_stage`.`user`.`id`));
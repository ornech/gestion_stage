<?php
require_once 'config/auth.php';
?>
<p class="title is-2"> Liste des contacts</p>
<h3>Emails sélectionnés :</h3>
<textarea id="emailList" class="textarea" rows="5" readonly></textarea>

<table class="table is-fullwidth is-hoverable">
    <thead>
        <tr>
            <th class="has-text-centered">Contact</th>
            <th class="has-text-centered">Email</th>
            <th class="has-text-centered">Entreprise</th>
            <th class="has-text-centered">Jury</th>
        </tr>
    </thead>

    <?php foreach ($contacts as $contact) {
        if ($contact->email === "") continue;
    ?>
        <tr data-email="<?= htmlspecialchars($contact->email) ?>">
            <td><?= $contact->nom != null ? htmlspecialchars($contact->nom) : "-" ?> <?= $contact->prenom != null ? htmlspecialchars($contact->prenom) : "Non défini" ?></td>
            <td><?= $contact->email != null ? htmlspecialchars($contact->email) : "-"; ?></td>
            <td>
                <a href='/router.php?page=fiche_entreprise&idEntreprise=<?= $contact->EntrepriseID ?>'>
                    <?= $contact->entreprise != null ? htmlspecialchars($contact->entreprise) : "-" ?>
                </a>
            </td>
            <td><?= $contact->Entreprise_ville != null ? htmlspecialchars($contact->Entreprise_ville) : "-" ?></td>
        </tr>
    <?php } ?>
</table>

<button class="button is-primary" onclick="openModal()">Valider</button>

<!-- Modal Structure -->
<div id="emailModal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            <h2 class="title is-4">Emails sélectionnés</h2>
            <textarea id="modalEmailList" class="textarea" rows="10" readonly></textarea>
            <button class="button is-danger" onclick="closeModal()">Fermer</button>
        </div>
    </div>
    <button class="modal-close is-large" onclick="closeModal()" aria-label="close"></button>
</div>

<script>
    // Fonction pour mettre à jour la liste des emails
    function updateEmailList(email, add) {
        const textarea = document.getElementById('emailList');
        const currentEmails = textarea.value.split('\n').filter(e => e.trim() !== '');

        if (add && !currentEmails.includes(email)) {
            currentEmails.push(email);
        } else if (!add) {
            const index = currentEmails.indexOf(email);
            if (index > -1) {
                currentEmails.splice(index, 1);
            }
        }

        textarea.value = currentEmails.join('\n');
    }

    // Ajouter un gestionnaire d'événements pour les clics sur les lignes
    document.querySelectorAll('.table tbody tr').forEach(row => {
        row.addEventListener('click', function() {
            const email = this.getAttribute('data-email');
            this.classList.toggle('is-selected');
            updateEmailList(email, this.classList.contains('is-selected'));
        });
    });

    // Fonction pour ouvrir le modal
    function openModal() {
        const modal = document.getElementById('emailModal');
        const modalTextarea = document.getElementById('modalEmailList');
        const emailList = document.getElementById('emailList').value;

        modalTextarea.value = emailList;
        modal.classList.add('is-active');
    }

    // Fonction pour fermer le modal
    function closeModal() {
        const modal = document.getElementById('emailModal');
        modal.classList.remove('is-active');
    }
</script>

<style>
    /* Assurer que toutes les colonnes ont la même largeur */
    .table th,
    .table td {
        width: 25%;
        text-align: center;
    }

    /* Style pour les lignes sélectionnées */
    .table tbody tr.is-selected {
        background-color: #cce5ff;
        /* Couleur de sélection pour le mode clair */
    }

    /* Mode sombre */
    @media (prefers-color-scheme: dark) {
        .table tbody tr.is-selected {
            background-color: #4a4a4a;
            /* Couleur de sélection pour le mode sombre */
        }
    }
</style>
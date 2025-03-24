# Présentation 
Cette application permet: 
 * de consulter l'annuaire des entreprises ayant embauchées nos étudiants.
 * de rechercher une entreprise afin de proposer sa candidature 
 * de suivre les stages et de récupérer sa convention de stage pré-remplie

# Spécifications 
* Mariadb
* PHP8, architecture MVC
* Javascript
* HTML/CSS
* Framework Bulma.io

# Fonctionnalités 
## Pour les Etudiants
1) Consulter l'annuaire
2) Importer une entreprise a partir de son N° de Siret depuis les bases de donnée opendata.gouv.fr
3) Ajouter manuellement une entreprise
4) Ajouter un contrat a une entreprise
5) Modifier les contacts qu'il a ajouté
6) Préconfigurer les données a insérer dans sa convention de stage
7) Télécharger sa convention de stage pré-remplie au format pdf afin de l'imprimer ou la transmettre par mail a son entreprise.

## Pour les enseignants 
1) Administrer les comptes utilisateurs (désactivation de compte, réinitialisation de mot de passe)
2) Importer des comptes étudiants depuis un export Pronote
3) Anonymiser un compte utilisateur
4) Importer une entreprise depuis son N° de Siret
5) Ajouter un contact au sein d'une entreprise
6) Supprimer et anonymyser un contact d'une entreprise
7) Suivre et valider les actions réalisés par les étudiants (demande d'ajout d'entreprise ou d'un contact) depuis un journal de log.
8) Créer un stage pour un étudiant
9) Changer un étudiant de promotion
10) Changer la spécialité d'un étudiant
11) Attribuer un tuteur a un étudiant
12) Suivre des étudiants au cours de leur stage

# Autres points
* Respect des réglementation et spécifications RGPD, notamment l'anonymisation des contacts entreprise après 5 ans.
* Protection des routes
* Chiffrement des mots de passe
* Gestion des erreurs, notamment des erreurs SQL

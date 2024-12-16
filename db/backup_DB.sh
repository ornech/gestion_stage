#!/bin/bash
#set -x  # Active le mode de debug pour le suivi

# Configuration
DB_HOST=""  # Hôte de la base de données
DB_USER=""  # Nom d'utilisateur MySQL
DB_PASS=""  # Mot de passe MySQL
DB_NAME=""  # Nom de la base de données à sauvegarder
MAIL_TO="premier.email@exemaple.com second.email@example.com"  # Destinataires
MAIL_SUBJECT="Backup DB Gestage $(date +'%Y-%m-%d')"  # Sujet du mail

# Date du jour pour nommer le fichier de sauvegarde
DATE=$(date +'%Y-%m-%d_%H-%M-%S')

# Nom du fichier de sauvegarde
BACKUP_FILE="/tmp/${DB_NAME}_backup_${DATE}.sql"

# Fichier de log pour les erreurs SQL
ERROR_LOG="/tmp/${DB_NAME}_backup_error.log"

# Récupère les tables et nombres d'entrée, puis les mets en forme dans un tableau ascii
RESULT=$(mysql -N -h "${DB_HOST}" -u "${DB_USER}" -p"${DB_PASS}" -e "SELECT TABLE_NAME, TABLE_ROWS FROM
INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='${DB_NAME}';" | (echo -e "TABLE_NAME\tTABLE_ROWS" && cat) | column -t)


# Réalisation du dump de la base de données
echo "Sauvegarde de la base de données ${DB_NAME}..."
mysqldump -h "${DB_HOST}" -u "${DB_USER}" -p"${DB_PASS}" "${DB_NAME}" > "${BACKUP_FILE}" 2> "${ERROR_LOG}"

if [ $? -eq 0 ]; then
    echo "Sauvegarde réussie : ${BACKUP_FILE}"
    ERROR_MESSAGE="Aucune erreur lors de la sauvegarde."
    ERROR_CONTENT=""
else
    echo "Erreur lors de la sauvegarde de la base de données."
    ERROR_MESSAGE="Erreur de sauvegarde détectée :"
    ERROR_CONTENT=$(cat "${ERROR_LOG}")
    rm -f "${BACKUP_FILE}"  # Supprime le fichier de sauvegarde si une erreur se produit
fi

# Corps du message (erreurs incluses si présentes)
MAIL_BODY="Base de données: ${DB_NAME}
Date: ${DATE}
Fichier: ${BACKUP_FILE}
Destinataire: ${MAIL_TO}

Contenu:
${RESULT}

${ERROR_MESSAGE}

${ERROR_CONTENT}"

# Envoi du mail avec mailx
echo -e "${MAIL_BODY}" | mailx -s "${MAIL_SUBJECT}" -a "${BACKUP_FILE}" ${MAIL_TO}

if [ $? -eq 0 ]; then
    echo "Mail envoyé avec succès à ${MAIL_TO}"
else
    echo "Erreur lors de l'envoi du mail."
    exit 1
fi

# Optionnel : Supprimer le fichier de sauvegarde après l'envoi
# rm -f "${BACKUP_FILE}"

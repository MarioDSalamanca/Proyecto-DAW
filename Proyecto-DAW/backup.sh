#!/bin/bash

# Configuración de la base de datos
    DB_HOST="localhost"
    DB_USER="root"
    DB_PASSWORD="rootroot"
    DB_NAME="ERP"
    BACKUP_DIR="./backups/"
    TIMESTAMP=$(date +"%d-%m-%Y")

# Dump a la base de datos (copia)
    mysqldump -h $DB_HOST -u $DB_USER -p$DB_PASSWORD $DB_NAME > $BACKUP_DIR/$DB_NAME-$TIMESTAMP.sql

# Eliminar respaldos antiguos de más de 3 días
    find $BACKUP_DIR -type f -name "*.sql" -mtime +3 -exec rm {} \;

# Pasos para automatizar
    # El demonio cron de Ubuntu para automatizar tareas
    # crontab -e
    # Se ejecuta todos los días a la 1 am
    # 0 1 * * * /var/www/html/ruta del proyecto/backup.sh
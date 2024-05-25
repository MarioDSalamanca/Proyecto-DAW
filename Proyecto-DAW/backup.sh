#!/bin/bash

# Configuración de la base de datos
    DB_HOST="localhost"
    DB_USER="root"
    DB_PASSWORD="rootroot"
    DB_NAME="ERP"
    BACKUP_DIR="./backups/"
    TIMESTAMP=$(date +"%Y%m%d%H%M")

# Crear el respaldo
    mysqldump -h $DB_HOST -u $DB_USER -p$DB_PASSWORD $DB_NAME > $BACKUP_DIR/$DB_NAME-$TIMESTAMP.sql

# Opcional: Eliminar respaldos antiguos (ej. más de 7 días)
    find $BACKUP_DIR -type f -name "*.sql" -mtime +3 -exec rm {} \;
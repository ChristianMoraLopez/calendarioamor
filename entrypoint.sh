#!/bin/bash
set -e

# Ejecuta las migraciones
php artisan migrate --force

# Ejecuta cualquier otro comando necesario antes de iniciar
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Inicia supervisord
exec "$@"

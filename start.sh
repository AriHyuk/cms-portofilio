#!/bin/sh

php artisan storage:link || true
php artisan migrate --force || true
php artisan serve --host=0.0.0.0 --port=${PORT:-8000}

php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear


#!/bin/bash
set -e

echo "==> Installing PHP dependencies..."
composer install --no-interaction --prefer-dist --optimize-autoloader

echo "==> Generating APP_KEY..."
php artisan key:generate --force

echo "==> Running migrations..."
php artisan migrate --force

echo "==> Build completed successfully!"

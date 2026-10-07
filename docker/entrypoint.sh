#!/bin/sh
set -e
cd /app

if [ -z "$APP_KEY" ]; then
  echo "ERROR: APP_KEY is not set. Generate one with:"
  echo "  php artisan key:generate --show"
  exit 1
fi

mkdir -p "$(dirname "$DB_DATABASE")"
touch "$DB_DATABASE"

php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

exec "$@"

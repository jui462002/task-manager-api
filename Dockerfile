# Use PHP 8.1 with built-in server
FROM php:8.1-cli

# Install required extensions
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    postgresql-client \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

COPY . .

# Build
RUN composer install --no-interaction --prefer-dist --optimize-autoloader
RUN php artisan key:generate --force || true
RUN php artisan migrate --force --no-interaction || true

EXPOSE $PORT
CMD php -S 0.0.0.0:$PORT public/index.php

# Multi-stage build
FROM php:8.1-cli AS builder

# Install required extensions and dependencies
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

# Install PHP dependencies (skip scripts first)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-scripts && \
    composer run-script post-autoload-dump || true

# Production stage
FROM php:8.1-cli

# Install runtime dependencies
RUN apt-get update && apt-get install -y \
    postgresql-client \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

WORKDIR /app

COPY --from=builder /app/vendor ./vendor
COPY . .

# Generate app key
RUN php artisan key:generate --force || true

EXPOSE 8080

CMD php -S 0.0.0.0:${PORT:-8080} public/index.php

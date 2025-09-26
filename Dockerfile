# Dockerfile for Laravel 12 with PHP 8.2 CLI

FROM php:8.2-cli

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libonig-dev \
    curl \
    && docker-php-ext-install pdo_mysql mbstring zip sockets pcntl

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy Laravel project files
COPY . .

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# syntax=docker/dockerfile:1

FROM php:8.3-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    libssl-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libwebp-dev \
    libjpeg62-turbo-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install dependencies
RUN composer install --optimize-autoloader --no-dev

# Copy .env if you want (optional, for local dev)
# COPY .env.example .env

# Set permission
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

EXPOSE 9000

CMD ["php-fpm"]

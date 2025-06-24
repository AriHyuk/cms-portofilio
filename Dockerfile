FROM php:8.3-fpm

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
    libicu-dev \
    && docker-php-ext-install intl pdo_mysql mbstring exif pcntl bcmath gd zip fileinfo

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --optimize-autoloader --no-dev

RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

# Tambahkan start.sh dan kasih izin executable
COPY start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 8000

CMD ["/start.sh"]

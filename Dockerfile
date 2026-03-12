FROM php:8.3-fpm

# Install dependensi sistem
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip libzip-dev

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extension PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . /var/www

# Env + sqlite
RUN cp .env.example .env && \
    mkdir -p database && \
    touch database/database.sqlite

# Install laravel dependency
RUN composer install --no-dev --no-scripts --optimize-autoloader --ignore-platform-reqs

# Permission
RUN chmod -R 777 storage bootstrap/cache database

# Jalankan saat container start
CMD php artisan key:generate && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=80

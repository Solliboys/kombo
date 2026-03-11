FROM php:8.2-fpm

RUN apt-get update && apt-get install -y git curl libpng-dev libonig-dev libxml2-dev zip unzip libzip-dev
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . /var/www

# TAMBAHKAN INI: Salin file env example jadi env beneran agar Laravel tidak error
RUN cp .env.example .env

# Jalankan instalasi tanpa mengeksekusi script Laravel dulu
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs --no-scripts

# Baru jalankan discover setelah semua aman
RUN php artisan package:discover --ansi

CMD php artisan serve --host=0.0.0.0 --port=80

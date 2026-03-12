FROM php:8.3-fpm

# Install dependensi sistem
RUN apt-get update && apt-get install -y git curl libpng-dev libonig-dev libxml2-dev zip unzip libzip-dev
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . /var/www

# Salin env dan buat database kosong
RUN cp .env.example .env &&     mkdir -p database &&     touch database/database.sqlite

# Konfigurasi .env pakai pembatas yang aman agar tidak error
RUN sed -i 's|DB_CONNECTION=mysql|DB_CONNECTION=sqlite|g' .env &&     sed -i 's|DB_DATABASE=laravel|DB_DATABASE=/var/www/database/database.sqlite|g' .env

# Install library tanpa menjalankan kodingan Laravel dulu (agar tidak error database)
RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist --ignore-platform-reqs

# Beri izin akses folder
RUN chmod -R 777 storage bootstrap/cache database

# LANGKAH KUNCI: Buat tabel DULU baru nyalakan server
CMD php artisan key:generate && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=80

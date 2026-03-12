FROM php:8.3-fpm

# Install dependensi sistem
RUN apt-get update && apt-get install -y git curl libpng-dev libonig-dev libxml2-dev zip unzip libzip-dev
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . /var/www

# Buat env dan database kosong
RUN cp .env.example .env &&     mkdir -p database &&     touch database/database.sqlite

# KUNCI UTAMA: Tambahkan --no-scripts agar build tidak error
RUN composer install --no-dev --no-scripts --optimize-autoloader --ignore-platform-reqs

# Baru generate key setelah library terpasang
RUN php artisan key:generate

# Izin akses folder
RUN chmod -R 777 storage bootstrap/cache database

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]

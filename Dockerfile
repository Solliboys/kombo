FROM php:8.3-fpm

RUN apt-get update && apt-get install -y git curl libpng-dev libonig-dev libxml2-dev zip unzip libzip-dev
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . /var/www

# PAKSA PAKAI SQLITE UNTUK LATIHAN AGAR MUDAH
RUN cp .env.example .env &&     mkdir -p database &&     touch database/database.sqlite &&     sed -i 's/DB_CONNECTION=mysql/DB_CONNECTION=sqlite/g' .env &&     sed -i 's/DB_DATABASE=laravel/DB_DATABASE=\/var\/www\/database\/database.sqlite/g' .env &&     sed -i 's/APP_KEY=/APP_KEY=base64:0X+/ybqrX5eiM2z4PST+czVfOwTIzPoEWS9rxt0jSXs=/g' .env

RUN composer install --no-dev --no-scripts --optimize-autoloader --ignore-platform-reqs
RUN chmod -R 777 storage bootstrap/cache database

# LANGKAH KUNCI: Jalankan migrasi BARU NYALAKAN SERVER
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=80

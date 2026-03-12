FROM php:8.3-fpm

RUN apt-get update && apt-get install -y git curl libpng-dev libonig-dev libxml2-dev zip unzip libzip-dev
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . /var/www

# Salin env dan buat file database kosong agar tidak crash
RUN cp .env.example .env &&     mkdir -p database &&     touch database/database.sqlite

RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Generate key agar aman
RUN php artisan key:generate

# Beri izin akses folder dan file database
RUN chmod -R 777 storage bootstrap/cache database

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]

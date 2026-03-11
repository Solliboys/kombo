FROM php:8.3-fpm

RUN apt-get update && apt-get install -y git curl libpng-dev libonig-dev libxml2-dev zip unzip libzip-dev
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . /var/www

RUN cp .env.example .env

RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist
RUN chmod -R 777 storage bootstrap/cache

CMD php artisan key:generate && php artisan serve --host=0.0.0.0 --port=80

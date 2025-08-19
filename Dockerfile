FROM php:8.2-fpm-alpine

WORKDIR /var/www

RUN apk add --no-cache \
    build-base \
    autoconf \
    libtool \
    libzip-dev \
    zip \
    unzip \
    git \
    supervisor \
    openssl \
    oniguruma-dev \
    libpng-dev \
    jpeg-dev \
    freetype-dev \
    icu-dev

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl opcache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer



COPY . /var/www



RUN chown -R www-data:www-data /var/www/storage \
    /var/www/bootstrap/cache

RUN composer install --no-dev --optimize-autoloader --no-interaction

RUN php artisan key:generate || true



EXPOSE 8000

RUN ls -lah /var/www && ls -lah /var/www/public


CMD ["php", "artisan", "serve", "--host", "0.0.0.0", "--port", "8000"]
FROM php:8.3-apache

RUN docker-php-ext-install mysqli pdo_mysql

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html

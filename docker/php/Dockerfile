FROM php:7.4-fpm
RUN apt-get update && apt-get install -y vim
RUN apt-get install -y zlib1g-dev libzip-dev libpq-dev git libicu-dev libxml2-dev

# Xdebug
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
RUN curl https://getcomposer.org/download/1.10.6/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer

WORKDIR /var/www/app

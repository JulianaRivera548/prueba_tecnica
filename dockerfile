FROM php:8.0-fpm


WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip \
    && docker-php-ext-install zip pdo_mysql \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

CMD ["php-fpm"]
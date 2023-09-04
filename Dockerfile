FROM php:8.2-apache
RUN apt-get update && apt-get install -y \
        libfreetype-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && apt-get install -y libzip-dev \
    && docker-php-ext-install zip

# Instale a extensão intl
RUN apt-get install -y libicu-dev \
    && docker-php-ext-install intl

RUN pecl install redis-5.3.7 \
    && pecl install xdebug-3.2.1 \
    && docker-php-ext-enable redis xdebug

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY ./ /var/www/html/
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer update

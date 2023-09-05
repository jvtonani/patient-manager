FROM php:8.2-apache
RUN apt-get update && apt-get install -y \
        libfreetype-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libzip-dev \
        libicu-dev \
        libpq-dev \
        curl \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-install zip

RUN docker-php-ext-install intl

RUN docker-php-ext-install pdo pdo_pgsql

RUN pecl install redis-5.3.7 \
    && pecl install xdebug-3.2.1 \
    && docker-php-ext-enable redis xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copie o código da aplicação
COPY ./ /var/www/html/ci4-app

COPY ./codeigniter.conf /etc/apache2/sites-available/codeigniter.conf

RUN a2ensite codeigniter

ENV COMPOSER_ALLOW_SUPERUSER=1

#RUN composer update

COPY ./cacert.pem /usr/local/etc/php/cacert.pem

RUN echo "curl.cainfo=/usr/local/etc/php/cacert.pem" >> /usr/local/etc/php/php.ini



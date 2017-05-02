FROM php:5.6

RUN apt-get update && \
    apt-get install -y \
    zlib1g-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng12-dev \
    libxml2-dev

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN apt-get install libssl-dev -y \
    && pecl install mongo \
    && docker-php-ext-enable mongo

RUN docker-php-ext-install pdo pdo_mysql zip mcrypt

WORKDIR /var/www
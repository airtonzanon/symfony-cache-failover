FROM php:5.6

RUN apt-get update && \
    apt-get install -y \
    zlib1g-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng12-dev \
    libxml2-dev \
    wget \
    libssl-dev \
    && rm -rf /var/lib/apt/lists/*

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN pecl install mongo \
    && docker-php-ext-enable mongo

RUN docker-php-ext-install pdo pdo_mysql zip mcrypt

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN wget https://phar.phpunit.de/phpunit-5.7.phar \
    && chmod +x phpunit-5.7.phar \
    && mv phpunit-5.7.phar /usr/local/bin/phpunit

WORKDIR /var/www
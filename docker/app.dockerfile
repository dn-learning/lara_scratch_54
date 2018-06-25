FROM php:7.2.6-fpm

# installing useful ubuntu additions
RUN apt-get update && apt-get install -y curl \
    git \
    htop \
    nano \
    unzip \
    wget \
    mysql-client

# installing xdebug
RUN yes | pecl install xdebug \
    && docker-php-ext-enable xdebug

# installing mysql drivers
RUN docker-php-ext-install pdo_mysql

# Clean up APT
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN usermod -u 1000

ADD ./docker/php.ini /usr/local/etc/php

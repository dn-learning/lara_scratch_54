FROM php:7.2.6-fpm

# installing useful ubuntu additions
# also needed for php || nodejs
RUN apt-get update && apt-get install -y curl \
    git \
    htop \
    nano \
    unzip \
    wget \
    mysql-client \
    python \
    make \
    g++ \
    libssl-dev \
    apache2-utils \
    gnupg \
    libpng-dev 

# installing nodejs & npm
RUN curl -sL https://deb.nodesource.com/setup_8.x | bash -
RUN apt-get install -y nodejs

# installing xdebug
RUN yes | pecl install xdebug \
    && docker-php-ext-enable xdebug

# installing mysql drivers
RUN docker-php-ext-install pdo_mysql

# Clean up APT
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

ADD ./docker/php.ini /usr/local/etc/php

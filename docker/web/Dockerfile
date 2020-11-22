ARG PHP_VERSION=""
FROM php:${PHP_VERSION}-apache

# Install packages
RUN apt-get update \
    && apt-get install -y --no-install-recommends iputils-ping git curl vim zlib1g-dev libzip-dev libpng-dev zip unzip mariadb-client-10.3

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql zip gd

RUN pecl install redis \
    && docker-php-ext-enable redis

# enable rewriting url
RUN a2enmod rewrite

# Install composer
RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
       mv composer.phar /usr/local/bin/composer

# Set working directory
WORKDIR /var/www/src

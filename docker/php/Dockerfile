FROM php:7.4.6-fpm

COPY ./php.ini /usr/local/etc/php/php.ini

RUN apt-get update \
    && apt-get install -y git acl openssl openssh-client wget zip vim librabbitmq-dev libssh-dev \    
    && apt-get install -y libpng-dev zlib1g-dev libzip-dev libxml2-dev libicu-dev \
    && docker-php-ext-install intl mysqli pdo pdo_mysql zip gd soap bcmath sockets \
    && pecl install xdebug amqp \
    && docker-php-ext-enable --ini-name 05-opcache.ini opcache amqp xdebug

#RUN mkdir -p /appdata/www/public
#WORKDIR /appdata/www/public

RUN mkdir -p /appdata/www/public
COPY . /appdata/www
WORKDIR /appdata/www
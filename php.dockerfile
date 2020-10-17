FROM php:7.4-fpm-alpine

ADD ./php/www.conf /usr/local/etc/php-fpm.d/www.conf
COPY bin/start.sh /usr/local/bin/start

RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

RUN mkdir -p /var/www/html

RUN chown laravel:laravel /var/www/html \
    && chmod u+x /usr/local/bin/start

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

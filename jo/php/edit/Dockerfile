FROM php:8.2-fpm-alpine3.18
USER root

RUN set -ex \
    && apk update \
    && apk upgrade --available \
    && apk add --no-cache --virtual .build-deps \
        autoconf dpkg-dev dpkg file g++ gcc libc-dev make pkgconf re2c \
    && apk add --no-cache \
        nginx bash mysql-client supervisor mariadb-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && apk del .build-deps \
    && rm -rf /var/cache/apk/*
    
COPY . /var/www/html/edit
WORKDIR /var/www/html/edit
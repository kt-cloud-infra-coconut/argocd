FROM php:8.2-fpm

# mysqli, pdo_mysql 설치
RUN docker-php-ext-install mysqli pdo pdo_mysql

# 필요 시 PHP 설정 복사
COPY . /var/www/html

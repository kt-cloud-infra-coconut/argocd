FROM php:8.2-fpm

# mysqli, pdo_mysql 설치
RUN docker-php-ext-install mysqli pdo pdo_mysql

# 변경
COPY index.php /var/www/html/
COPY regist/ /var/www/html/regist/
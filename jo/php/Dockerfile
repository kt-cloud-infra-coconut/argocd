# PHP-FPM 8.1 기반
FROM php:8.1-fpm

# mysqli, pdo_mysql 확장 설치
RUN docker-php-ext-install mysqli pdo pdo_mysql

# 현재 php 폴더 안의 파일 복사
COPY . /var/www/html

# 작업 디렉토리
WORKDIR /var/www/html

# 권한 설정
RUN chown -R www-data:www-data /var/www/html

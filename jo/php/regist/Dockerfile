# 베이스 이미지
FROM php:8.2-fpm-alpine

RUN apk update && apk add --no-cache nginx openrc bash

# PHP 코드 복사
COPY . /var/www/html/regist

# Nginx 설정 복사
COPY ./nginx-regist.conf /etc/nginx/conf.d/default.conf

# 권한 문제 예방
RUN chown -R www-data:www-data /var/www/html/regist

# Supervisor 설정
COPY ./supervisord.conf /etc/supervisord.conf

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]

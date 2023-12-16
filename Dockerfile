FROM php:8-apache
LABEL org.opencontainers.image.authors="bill@plein.org"

RUN curl -Lo /px-image-list.sh https://raw.githubusercontent.com/bplein/px-image-list/main/px-image-list.sh \
    && chmod +x /px-image-list.sh
COPY index.php /var/www/html/

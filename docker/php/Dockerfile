FROM php:8.1-fpm

RUN apt update \
    && apt install -y zlib1g-dev g++ git libicu-dev zip libzip-dev curl libpq-dev zip \
    && apt install -y --no-install-recommends && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install intl pdo pdo_pgsql pgsql \
    && docker-php-ext-enable pdo_pgsql \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

ADD ./error_reporting.ini /usr/local/etc/php/conf.d/error_reporting.ini

EXPOSE 9000

WORKDIR /testbh

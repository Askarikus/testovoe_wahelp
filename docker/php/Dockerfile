FROM php:8.1-fpm

RUN apt update \
    && apt install -y zlib1g-dev g++ git libicu-dev zip libzip-dev curl libpq-dev libpng-dev zip cron supervisor \
    && apt install -y libmagickwand-dev --no-install-recommends && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install intl opcache pdo pdo_pgsql pgsql \
    && pecl install apcu imagick \
    && docker-php-ext-enable apcu imagick pdo_pgsql \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip gd

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

ADD ./xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
ADD ./error_reporting.ini /usr/local/etc/php/conf.d/error_reporting.ini

EXPOSE 9000

WORKDIR /testbh

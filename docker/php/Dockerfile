FROM php:8.1-fpm

RUN apt-get update && \
    apt-get install -y --no-install-recommends libssl-dev zlib1g-dev curl git unzip netcat libxml2-dev libpq-dev libzip-dev && \
    apt-get install libssl-dev -y && \
    apt-get install net-tools -y && \
    apt-get install wget -y && \
    pecl install apcu  && \
    docker-php-ext-install -j$(nproc) zip opcache intl   && \
    docker-php-ext-enable apcu  sodium
RUN apt-get update && apt-get install -y libmagickwand-dev --no-install-recommends && rm -rf /var/lib/apt/lists/*


RUN mkdir /var/log/bonushelp

RUN docker-php-ext-install pdo pdo_pgsql zip
RUN docker-php-ext-enable apcu pdo_pgsql sodium

RUN printf "\n" | pecl install imagick
RUN docker-php-ext-enable imagick

ADD ./xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
ADD ./error_reporting.ini /usr/local/etc/php/conf.d/error_reporting.ini

EXPOSE 9000

WORKDIR /testbh
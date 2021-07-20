FROM php:8.0.1-fpm

RUN apt-get update && apt-get install -y

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && sync
RUN install-php-extensions apcu
RUN install-php-extensions opcache
RUN install-php-extensions pdo_pgsql pgsql
RUN install-php-extensions zip
RUN install-php-extensions redis
RUN install-php-extensions intl
RUN install-php-extensions @composer

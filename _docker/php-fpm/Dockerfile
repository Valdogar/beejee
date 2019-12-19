FROM php:7.2-fpm

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        exiftool \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-configure exif && docker-php-ext-install exif && docker-php-ext-enable exif \
    && docker-php-ext-install -j$(nproc) pdo_mysql mysqli

RUN apt-get install git unzip -y

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN chmod a+x composer.phar
RUN mv composer.phar /usr/local/bin/composer

WORKDIR /application

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV BS_MYSQL_ROOT_PASSWORD ${BS_MYSQL_ROOT_PASSWORD}
FROM php:7.2-apache

MAINTAINER Nathan M. Russo <natanaelrusso18@hotmail.com>

ENV DEPENDENCIES \
	imagemagick \
    libfreetype6 \
    libjpeg62-turbo \
    locales \
    locales-all

ENV BUILD_PACKAGES \
    libcurl4-openssl-dev \
    libfreetype6-dev \
    libicu-dev \
    libjpeg-dev \
    libjpeg62-turbo-dev \
    libmagickwand-dev \
    libmcrypt-dev \
    libmemcached-dev \
    libncurses5-dev \
    libpng-dev \
    libpq-dev \
    libtidy-dev \
    libxml2-dev \
    libxpm-dev \
    libz-dev \
    libzip-dev \
    libwebp-dev \
    zlib1g-dev


RUN apt-get update \
	&& apt-get install -y ssl-cert git zip unzip \
	&& pecl install xdebug \
	&& docker-php-ext-install pcntl \
	&& php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
	&& /usr/bin/composer global require hirak/prestissimo \
	&& rm -rf /var/lib/apt/lists/*

RUN apt-get update \
    && apt-get install -y $DEPENDENCIES $BUILD_PACKAGES \
    && docker-php-ext-configure gd \
        --with-gd \
        --with-webp-dir \
        --with-jpeg-dir=/usr/lib/x86_64-linux-gnu \
        --with-png-dir=/usr/lib/x86_64-linux-gnu \
        --with-zlib-dir \
        --with-xpm-dir \
        --with-freetype-dir=/usr/lib/x86_64-linux-gnu \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install gd \
    && docker-php-ext-install intl \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-install zip \
    && pecl install imagick \
    && echo "extension=imagick.so" > /usr/local/etc/php/conf.d/imagick.ini \
    && apt-get remove -y $BUILD_PACKAGES \
    && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite

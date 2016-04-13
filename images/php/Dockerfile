FROM php:5.6-fpm

ADD php.ini    /usr/local/etc/php/php.ini
ADD php-fpm.conf    /usr/local/etc/php-fpm.conf

RUN apt-get update && apt-get install -y \
        libmcrypt-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng12-dev

RUN docker-php-ext-install iconv mcrypt \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
		&& docker-php-ext-install gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install mysqlidocker

WORKDIR /opt
RUN usermod -u 1000 www-data

EXPOSE 9000
VOLUME ["/opt"]

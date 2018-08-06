FROM php:7.1.13-fpm

ADD php.ini    /usr/local/etc/php/php.ini
ADD php-fpm.conf    /usr/local/etc/php-fpm.conf

RUN apt-get update && apt-get install -y \
# For bz2
				libbz2-dev \
# For gd
				libfreetype6-dev \
				libjpeg62-turbo-dev \
				libpng12-dev \
# For ftp
				libssl-dev \
# For mcrypt
				libmcrypt-dev \
# For memcached
				libmemcached-dev \
# For composer 
                zip unzip \
	&& \
# Cleanup
	apt-get clean && \
	rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install iconv mcrypt \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
	&& docker-php-ext-install gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install exif \
    && docker-php-ext-install bz2 \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install gettext \
    && docker-php-ext-install mysqli \
    && pecl install memcached \
    && pecl install redis-4.0.2 \
    && pecl install mongodb \
    && pecl install yaf-3.0.7 \
    && docker-php-ext-enable memcached redis mongodb yaf

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

WORKDIR /www
RUN usermod -u 1000 www-data

EXPOSE 9000
VOLUME ["/www"]

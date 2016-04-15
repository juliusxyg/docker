FROM php:5-fpm

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
    && docker-php-ext-enable memcached

WORKDIR /opt
RUN usermod -u 1000 www-data

EXPOSE 9000
VOLUME ["/opt"]

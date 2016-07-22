FROM php:7-fpm

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
    && pecl install yaf \
    && docker-php-ext-enable yaf \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && curl -L -o /tmp/memcached.tar.gz "https://github.com/php-memcached-dev/php-memcached/archive/php7.tar.gz" \
    && mkdir -p memcached \
    && tar -C memcached -zxvf /tmp/memcached.tar.gz --strip 1 \
    && ( \
        cd memcached \
        && phpize \
        && ./configure \
        && make -j$(nproc) \
        && make install \
    ) \
    && rm -r memcached \
    && rm /tmp/memcached.tar.gz \
    && docker-php-ext-enable memcached \
    && curl -L -o /tmp/redis.tar.gz https://github.com/phpredis/phpredis/archive/php7.tar.gz \
    && mkdir -p redis \
    && tar -C redis -zxvf /tmp/redis.tar.gz --strip 1 \
    && ( \
        cd redis \
        && phpize \
        && ./configure \
        && make -j$(nproc) \
        && make install \
    ) \
    && rm -r redis \
    && rm /tmp/redis.tar.gz \
    && docker-php-ext-enable redis

WORKDIR /opt
RUN usermod -u 1000 www-data

EXPOSE 9000
VOLUME ["/opt"]

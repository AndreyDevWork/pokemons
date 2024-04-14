FROM php:8.2.11-fpm

USER root

COPY src /var/www
COPY containers/php/php.sh /etc/php.sh
RUN chmod +x /etc/php.sh &&  \
    chmod 777 -R /var/www/storage
CMD ["/etc/php.sh"]


COPY containers/php/custom-php.ini /usr/local/etc/php/conf.d/custom-php.ini

RUN set -eux; \
    echo "\e[1;33mInstall COMPOSER\e[0m"; \
    cd /tmp \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer;

RUN apt-get update && apt-get install -y --no-install-recommends --fix-missing \
        curl \
        zip \
        unzip \
        git \
        libmemcached-dev \
        libz-dev \
        libpq-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libssl-dev \
        libwebp-dev \
        libxpm-dev \
        libmcrypt-dev \
        libmagickwand-dev \
        libonig-dev; \
    \
    echo "\e[1;33mInstall important libraries\e[0m"; \
    docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql; \
    docker-php-ext-install pdo pdo_pgsql pgsql; \
    pecl install imagick; \
    docker-php-ext-enable imagick; \
    \
    apt-get clean && rm -rf /var/lib/apt/lists/*;

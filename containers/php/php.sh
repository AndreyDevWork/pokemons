#!/usr/bin/env bash

set -e

chmod 777 -R /var/www/bootstrap/cache
chmod 777 -R /var/www/storage
chmod 777 -R /var/www/vendor

php-fpm

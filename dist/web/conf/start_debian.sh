#!/bin/bash

set -e

mkdir -p /run/php-fpm
chown -R www-data:www-data /run/php-fpm
chmod 0755 /run/php-fpm

/usr/sbin/sshd -D &

#working both
php-fpm8.2 -D &  
# service php8.2-fpm start & 
#

service nginx start &

nginx -g "daemon off;"


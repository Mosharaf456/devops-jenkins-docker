#!/bin/bash

set -e

mkdir -p /run/php-fpm
chown -R nginx:nginx /run/php-fpm
chmod 0755 /run/php-fpm

/usr/sbin/sshd -D & 

php-fpm -D &

nginx -g "daemon off;"


#!/bin/bash

set -e

/usr/sbin/sshd -D & 

/usr/sbin/php-fpm -c /etc/php/fpm 

nginx -g "daemon off;"


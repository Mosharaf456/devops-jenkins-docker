#!/bin/bash

set -e

/usr/sbin/sshd -D & 

php-fpm -D &

nginx -g "daemon off;"


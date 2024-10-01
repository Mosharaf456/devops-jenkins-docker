#!/bin/bash +x

set -e

docker-compose down 
docker-compose up --build

exit 0


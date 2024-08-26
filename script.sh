#!/bin/bash

NAME=$1
LASTNAME=$2
$SHOW=$3

if [ "$SHOW" = "true" ]; then
    echo " My name is $NAME $LASTNAME $NICKNAME and date time is $(date)"
else 
    echo "SHOW option mark please"
fi

# ssh-keygen -f remote-key

# Check Docker Daemon Logs: Review the Docker daemon logs to see if there are any errors or warnings:
# sudo journalctl -u docker.service

# docker exec -it jenkins_con bash
# apt-get -y install iputils-ping
# ssh remote_user@remote_host

# docker cp ./centos/remote-key jenkins_con:/tmp/remote-key

# ssh -i /tmp/remote-key remote_user@remote_host

# ssh remote_user@remote-host 
# 1234

# echo $?


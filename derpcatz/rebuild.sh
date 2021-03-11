#!/bin/bash

#this will kill, prune, rebuild and restart the docker in the folder of this script

CURRENT=`pwd`
Docker=`basename "$CURRENT"`

echo "$Docker"


NAME=$Docker

docker stop $NAME
docker container prune -f
docker build -t $NAME .
docker run -d --hostname ${NAME} --name ${NAME} -p 80:80 ${NAME}:latest

exit;

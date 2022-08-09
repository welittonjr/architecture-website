#!/bin/bash

COMMAND=$1
CONTAINER_ID=$(docker ps --filter name=php-app -aq)

docker exec -it $CONTAINER_ID sh -c "$COMMAND"
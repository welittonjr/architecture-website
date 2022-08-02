#!/bin/bash

# exemple of use: ./scripts/cli.sh "php spark --help"

COMMAND=$1
CONTAINER_ID=$(docker ps --filter name=apache-srv -aq)

docker exec -it $CONTAINER_ID sh -c "$COMMAND"
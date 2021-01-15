#!/bin/bash

if ! docker network ls | grep -q 'ap-network'; then
    echo "Creating a docker network for this tool"
    docker network create ap-network
    echo "Docker network created"
fi

docker-compose -f ./docker-compose.yml build

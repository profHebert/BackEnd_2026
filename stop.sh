#!/bin/bash
echo "Parando os containers..."
docker compose -f .devcontainer/docker-compose.yml down
echo "Servidores parados!"

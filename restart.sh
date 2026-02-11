#!/bin/bash
echo "Reiniciando os containers..."
docker compose -f .devcontainer/docker-compose.yml down
docker compose -f .devcontainer/docker-compose.yml up -d
echo "Servidores reiniciados!"

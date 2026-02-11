#!/bin/bash
echo "Iniciando os containers..."
docker compose -f .devcontainer/docker-compose.yml up -d
echo "Servidores iniciados!"

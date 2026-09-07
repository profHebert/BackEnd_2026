<?php

/**
 * Configurações de conexão com os bancos de dados.
 *
 * Os valores são lidos das variáveis de ambiente definidas no
 * .devcontainer/docker-compose.yml (serviço "web"). Isso evita
 * usuário/senha "hardcoded" espalhados pelos exemplos e facilita
 * trocar as credenciais em um único lugar.
 */

// MySQL
define('MYSQL_HOST', getenv('MYSQL_HOST') ?: 'db');
define('MYSQL_PORT', getenv('MYSQL_PORT') ?: '3306');
define('MYSQL_DATABASE', getenv('MYSQL_DATABASE') ?: 'app_db');
define('MYSQL_USER', getenv('MYSQL_USER') ?: 'app_user');
define('MYSQL_PASSWORD', getenv('MYSQL_PASSWORD') ?: 'app_pass');

// PostgreSQL
define('POSTGRES_HOST', getenv('POSTGRES_HOST') ?: 'postgres');
define('POSTGRES_PORT', getenv('POSTGRES_PORT') ?: '5432');
define('POSTGRES_DATABASE', getenv('POSTGRES_DATABASE') ?: 'app_db');
define('POSTGRES_USER', getenv('POSTGRES_USER') ?: 'app_user');
define('POSTGRES_PASSWORD', getenv('POSTGRES_PASSWORD') ?: 'app_pass');

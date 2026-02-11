FROM php:8.2-apache

RUN apt-get update && \
    apt-get install -y \
        git \
        unzip \
        curl \
        sqlite3 \
        libsqlite3-dev \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        mysqli \
        pdo_sqlite

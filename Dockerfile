FROM php:8.2-apache

# Instalar dependencias para PostgreSQL y PDO
RUN apt-get update && apt-get install -y \
        libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copiar tu código al contenedor
COPY . /var/www/html/

# Exponer puerto 80
EXPOSE 80

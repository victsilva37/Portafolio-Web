# Usa la imagen oficial de PHP con servidor embebido
FROM php:8.2-cli

# Instala extensiones comunes si necesitas MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copia todos los archivos del proyecto al contenedor
COPY . /app
WORKDIR /app

# Expone el puerto que usaremos para acceder
EXPOSE 3000

# Comando para iniciar tu portafolio
CMD ["php", "-S", "0.0.0.0:3000", "-t", "."]

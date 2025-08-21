# Usa la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instala extensiones necesarias (mysqli, pdo_mysql)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copia todo el proyecto a la carpeta raíz de Apache
COPY . /var/www/html/

# Asegúrate de que Apache pueda reescribir URLs si necesitas rutas amigables
RUN a2enmod rewrite

# Cambia permisos si es necesario
RUN chown -R www-data:www-data /var/www/html/

# Expone el puerto 80 (Apache)
EXPOSE 80

# Comando por defecto para iniciar Apache en primer plano
CMD ["apache2-foreground"]

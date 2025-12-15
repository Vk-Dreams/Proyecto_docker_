# web-app/Dockerfile

# Usamos una imagen base de PHP con Apache (ajusta la versión si es necesario)
FROM php:8.2-apache

# Instalamos extensiones comunes para MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiamos todos tus archivos del proyecto (ya están en web-app/)
# al directorio raíz de Apache dentro del contenedor.
COPY . /var/www/html/

# Exponemos el puerto 80 (el puerto HTTP estándar)
EXPOSE 80
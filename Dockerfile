# Imagen base con Apache y PHP
FROM php:8.2-apache

RUN docker-php-ext-install mysqli

# Copiar archivos del proyecto al directorio de Apache
COPY . /var/www/html/

# Habilitar variables de entorno para PHP
ENV DB_SERVER=devops_dos_mysql
ENV DB_USER=**** 
#Completar DB_USER con el usuario para conectarse a MySql
ENV DB_PASSWORD=****
#Completar DB_PASSWORD con la password para conectarse a MySql
ENV DB_NAME=bookstore

# Exponer puerto 80 para el servidor web
EXPOSE 80

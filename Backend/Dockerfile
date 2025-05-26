# Usar imagen base de PHP con Apache
FROM php:8.1-apache

# Instalar extensiones de PHP necesarias para MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# Copiar archivos del proyecto al directorio web de Apache
COPY . /var/www/html/

# Establecer permisos
RUN chown -R www-data:www-data /var/www/html/
RUN chmod -R 755 /var/www/html/

# Exponer puerto 80
EXPOSE 80 

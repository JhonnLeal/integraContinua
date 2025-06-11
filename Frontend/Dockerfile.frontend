# Dockerfile simple para Frontend + Backend
FROM php:8.1-apache

# Instalar Node.js para tests de frontend
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && apt-get install -y nodejs

# Instalar extensiones PHP necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# Copiar archivos del frontend
COPY Vista/ /var/www/html/Vista/
COPY public/ /var/www/html/public/
COPY package.json /var/www/html/
COPY tests/ /var/www/html/tests/

# Instalar dependencias de Node.js
RUN cd /var/www/html && npm install

# Establecer permisos
RUN chown -R www-data:www-data /var/www/html/
RUN chmod -R 755 /var/www/html/

# Agregar script para tests
RUN echo '#!/bin/bash\ncd /var/www/html && npm test' > /usr/local/bin/test-frontend && chmod +x /usr/local/bin/test-frontend

# Exponer puerto 80
EXPOSE 80 

# Dockerfile para Backend API
FROM php:8.1-apache

# Instalar dependencias del sistema necesarias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensiones PHP necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# Copiar archivos del backend
COPY . /var/www/html/

# Instalar solo dependencias de producción por defecto
RUN cd /var/www/html && composer install --no-dev --optimize-autoloader

# Establecer permisos
RUN chown -R www-data:www-data /var/www/html/
RUN chmod -R 755 /var/www/html/

# Agregar script para tests (instala dev dependencies cuando sea necesario)
RUN echo '#!/bin/bash\ncd /var/www/html\necho "📦 Instalando dependencias de test..."\ncomposer install --dev\necho "🧪 Ejecutando tests..."\nvendor/bin/phpunit tests' > /usr/local/bin/test-backend && chmod +x /usr/local/bin/test-backend

# Exponer puerto 80
EXPOSE 80 

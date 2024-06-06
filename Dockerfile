# Imagen base con PHP y Apache
FROM php:8.2-apache AS base

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Instala las dependencias necesarias
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    zip \
    vim \
    unzip \
    git \
    curl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Habilita módulos de Apache necesarios
RUN a2enmod rewrite

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia los archivos composer.json y composer.lock
COPY composer.json composer.lock ./

# Instala dependencias de Composer
RUN composer self-update
RUN composer clear-cache
RUN composer fund
RUN composer install --no-scripts --no-autoloader --no-dev

# Copia el resto de la aplicación al contenedor
COPY . .

# Configura permisos correctos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Compilación de assets (si es necesario)
# RUN php artisan view:cache && php artisan config:cache

# Exponer el puerto 80 para Apache
EXPOSE 80

# Imagen final
FROM base AS production

# Ejecutar el servidor Apache
CMD ["apache2-foreground"]

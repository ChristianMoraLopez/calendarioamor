# Usa la imagen oficial de PHP como base
FROM php:8.2

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Instala las dependencias necesarias
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    libzip-dev \
    libonig-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

#clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*


# Instala Node.js y npm
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs

# Instala las extensiones de PHP necesarias
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl gd bcmath

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Remove the default index.php file
RUN rm -rf /var/www/html/index.php

# Copy existing application directory contents
COPY --chown=www-data:www-data . /var/www/html

# Copy index.blade.php to the views directory
COPY --chown=www-data:www-data resources/views/index.blade.php /var/www/html/resources/views/

# Establece permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 755 /var/www/html

# Establece las variables de entorno
ENV DB_CONNECTION=mysql
ENV DB_HOST=calendario-amor.c5m8k2yea4i9.us-east-2.rds.amazonaws.com
ENV DB_PORT=3306
ENV DB_DATABASE=calendario-amor
ENV DB_USERNAME=admin
ENV DB_PASSWORD=4682Oscuridad

# Instala las dependencias de PHP y Node.js
RUN composer install

# Ejecuta los comandos de Laravel
RUN php artisan route:clear
RUN php artisan config:clear

# Exponer el puerto 8000 para el servidor Artisan
EXPOSE 8000

# Ejecutar el servidor Artisan
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

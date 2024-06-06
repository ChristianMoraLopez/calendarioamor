# Imagen base con PHP y Composer
FROM php:8.2-fpm AS base

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
    curl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala Node.js y npm
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs

# Instala las extensiones de PHP necesarias
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl gd bcmath


# Compilación de assets en una etapa separada
FROM base AS build

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia los archivos composer.json y package.json y ejecuta la instalación de dependencias antes de copiar el resto del proyecto para aprovechar la caché
COPY composer.json composer.lock ./
COPY package.json package-lock.json ./

# Instala dependencias de Composer
RUN composer install --no-scripts --no-autoloader

# Instala dependencias de Node.js
RUN npm install

# Copia el resto de la aplicación al contenedor
COPY . .

WORKDIR /app
COPY . /app

# Configura permisos correctos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 755 /var/www/html
RUN chmod -R 777 /var/www/html/storage/logs
RUN chmod -R 755 /var/www/html/storage/framework
RUN chmod -R 777 /var/www/html/storage/framework/views
RUN chmod -R 777 /var/www/html/storage/framework/sessions
RUN chmod -R 777 /var/www/html/storage/framework/cache


# Aplica los permisos específicos para Laravel
RUN chmod -R 755 /var/www/html/storage
RUN chmod -R o+w /var/www/html/storage



# Crea el archivo de base de datos SQLite
RUN touch /var/www/html/database/database.sqlite
RUN chown -R www-data:www-data /var/www/html/database/database.sqlite

# Ejecuta las migraciones para crear las tablas necesarias
RUN composer dump-autoload
RUN php artisan migrate --force

# Ejecuta los comandos de Laravel para limpiar la caché y verificar la instalación
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan cache:clear
RUN php artisan view:clear
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache


# Imagen final
FROM base AS final


# Ejecutar el servidor Artisan
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]


# Exponer el puerto 8000 para el servidor Artisan
EXPOSE 8000

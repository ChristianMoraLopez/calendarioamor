# Imagen base con PHP y Composer
FROM php:8.2-fpm

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

# Compilación de assets y configuración inicial
FROM base AS build

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia los archivos composer.json y package.json y ejecuta la instalación de dependencias antes de copiar el resto del proyecto para aprovechar la caché
COPY composer.json composer.lock ./
COPY package.json package-lock.json ./
COPY artisan /var/www/html/artisan


# Instala dependencias de Composer y Node.js
RUN composer install --no-scripts --no-autoloader && npm install

# Copia el resto de la aplicación al contenedor
COPY . .

# Configura permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 755 /var/www/html

# Compilación de assets
RUN npm run build

# Aplica los permisos específicos para Laravel
RUN chmod -R 755 /var/www/html/storage
RUN chmod -R o+w /var/www/html/storage

# Configuración de base de datos SQLite
RUN touch /var/www/html/database/database.sqlite
RUN chown -R www-data:www-data /var/www/html/database/database.sqlite



# Ejecuta las migraciones para crear las tablas necesarias
COPY --from=build /var/www/html /var/www/html
RUN php artisan migrate --force

# Ejecuta los comandos de Laravel para limpiar la caché y verificar la instalación
RUN php artisan config:clear && php artisan route:clear && php artisan cache:clear && php artisan view:clear && php artisan config:cache && php artisan route:cache && php artisan view:cache

# Exponer el puerto 8000 para el servidor Artisan
EXPOSE 8000

# Ejecutar el servidor Artisan
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

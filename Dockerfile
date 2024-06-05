# Usa la imagen oficial de PHP con Apache como base
FROM php:8.2-apache

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Instala las dependencias necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    supervisor \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql \
    && a2enmod rewrite

# Instala Node.js y npm
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia los archivos del proyecto
COPY . .

# Establece las variables de entorno
ENV DB_CONNECTION=mysql
ENV DB_HOST=calendario-amor.c5m8k2yea4i9.us-east-2.rds.amazonaws.com
ENV DB_PORT=3306
ENV DB_DATABASE=calendario-amor
ENV DB_USERNAME=admin
ENV DB_PASSWORD=4682Oscuridad

# Instala las dependencias de PHP y Node.js
RUN composer install --no-interaction --optimize-autoloader --no-dev
RUN npm install

# Establece permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Copia el archivo de configuración de Supervisor
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copia el archivo de entrada
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Expone el puerto 80 y 8000 para Apache y artisan
EXPOSE 80 8000

# Comando de inicio para Supervisor
ENTRYPOINT ["/entrypoint.sh"]
CMD ["/usr/bin/supervisord"]

# Use the official PHP image as base
FROM php:8.2-apache

# Set the working directory
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy project files
COPY . .


# Set environment variables
ENV DB_CONNECTION=mysql
ENV DB_HOST=calendario-amor.c5m8k2yea4i9.us-east-2.rds.amazonaws.com
ENV DB_PORT=3306
ENV DB_DATABASE=calendario-amor
ENV DB_USERNAME=admin
ENV DB_PASSWORD=4682Oscuridad

# Install PHP dependencies
RUN composer install

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 9000 to the outside
EXPOSE 9000

# Run PHP-FPM
CMD ["php-fpm"]

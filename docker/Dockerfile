# Dockerfile
FROM php:8.0-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    supervisor

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Copy supervisord config file
COPY ./docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copy php.ini
COPY ./docker/php.ini /usr/local/etc/php/

# Install Laravel dependencies
RUN composer install

# Expose port 9000 and start supervisor
EXPOSE 9000
CMD ["supervisord", "-n"] && php artisan migrate --force

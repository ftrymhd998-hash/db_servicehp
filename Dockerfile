FROM php:8.2-apache

# Install package yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git unzip zip libzip-dev libpng-dev libonig-dev libxml2-dev curl \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Aktifkan mod_rewrite Apache
RUN a2enmod rewrite

WORKDIR /var/www/html

# Copy semua file project
COPY . .

# Install dependency Laravel
RUN composer install --no-dev --optimize-autoloader

# Copy file env jika belum ada
RUN cp .env.example .env || true

# Generate APP_KEY
RUN php artisan key:generate || true

# ==========================
# TAMBAHKAN BAGIAN INI
# ==========================
RUN mkdir -p storage/framework/cache \
    && mkdir -p storage/framework/sessions \
    && mkdir -p storage/framework/views \
    && chmod -R 775 storage bootstrap/cache

# Permission
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80

CMD php artisan serve --host=0.0.0.0 --port=80
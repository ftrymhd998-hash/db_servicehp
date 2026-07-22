FROM php:8.2-apache

# Install dependency sistem
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip \
    && apt-get clean

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Aktifkan Apache Rewrite
RUN a2enmod rewrite

# DocumentRoot diarahkan ke folder public Laravel
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html

# Copy project
COPY . .

# Install dependency Laravel
RUN composer install --no-dev --optimize-autoloader

# Salin file .env bila belum ada
RUN cp .env.example .env || true

# Buat folder storage Laravel
RUN mkdir -p storage/framework/cache \
    && mkdir -p storage/framework/sessions \
    && mkdir -p storage/framework/views \
    && mkdir -p bootstrap/cache

# Permission
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# Generate APP_KEY (jika belum ada)
RUN php artisan key:generate --force || true

EXPOSE 80

CMD ["apache2-foreground"]
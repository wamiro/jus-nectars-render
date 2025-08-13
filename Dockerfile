
# Build a Laravel app on-the-fly inside the container using Dockerfile
# so your repo can stay light. Render will build this image and run Apache.
FROM php:8.3-apache

# System deps
RUN apt-get update && apt-get install -y git unzip libpq-dev         && docker-php-ext-install pdo pdo_pgsql         && a2enmod rewrite         && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Create Laravel project
WORKDIR /var/www/html
RUN composer create-project laravel/laravel .

# Copy our overlay (controllers, models, views, routes, migrations, etc.)
COPY overlay/ /var/www/html/

# Optimize permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Configure Apache to use public/ as document root
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf         && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Set production env defaults (Render will inject real env vars)
ENV APP_ENV=production
ENV APP_DEBUG=false

# Expose default web port
EXPOSE 80

# No CMD needed; Apache is the default.

FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    curl zip unzip git \
    libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif bcmath gd

RUN a2enmod rewrite

ENV APACHE_DOCUMENT_ROOT=/var/www/public
RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
 && sed -ri 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

WORKDIR /var/www
COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN php artisan storage:link || true
RUN php artisan config:clear && php artisan route:clear && php artisan view:clear

RUN npm install && npm run build

RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

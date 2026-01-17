# 1️⃣ Base Image (CLI is required for php -S)
FROM php:8.2-cli

# 2️⃣ System Dependencies
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    git \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# 3️⃣ Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 4️⃣ Install Node.js 20 (IMPORTANT)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# 5️⃣ Set Working Directory
WORKDIR /var/www

# 6️⃣ Copy Project Files
COPY . .

# 7️⃣ Install PHP Dependencies
RUN composer install --no-dev --optimize-autoloader

# 8️⃣ Storage Symlink (IMPORTANT)
RUN php artisan storage:link || true

# 9️⃣ Frontend Build
RUN npm install && npm run build

# 🔟 Permissions
RUN chmod -R 775 storage bootstrap/cache

# 1️⃣1️⃣ Expose (Render informational)
EXPOSE 10000

# 1️⃣2️⃣ Start Laravel on Render PORT
CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=$PORT"]

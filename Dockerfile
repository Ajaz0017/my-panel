# # Base Image
# FROM php:8.2-fpm

# # Install System Dependencies
# RUN apt-get update && apt-get install -y \
#     curl \
#     zip \
#     unzip \
#     git \
#     nano \
#     libpng-dev \
#     libonig-dev \
#     libxml2-dev \
#     && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# # Install Composer
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# # Set Working Directory
# WORKDIR /var/www

# # Copy Laravel Files
# COPY . .

# # Install Dependencies
# RUN composer install --no-dev --optimize-autoloader

# # Set Permissions
# RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# # Ensure Node.js installed
# RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash -
#   RUN apt-get install -y nodejs
  
#   # Install frontend dependencies & build assets
#   RUN npm install && npm run build

# # Expose Port 10000
# EXPOSE 10000

# # Start PHP-FPM
# CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]

# 1️⃣ Base Image
FROM php:8.2-fpm

# 2️⃣ Install System Dependencies
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    git \
    nano \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# 3️⃣ Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4️⃣ Set Working Directory
WORKDIR /var/www

# 5️⃣ Copy Laravel Files
COPY . .

# 6️⃣ Install PHP Dependencies
RUN composer install --no-dev --optimize-autoloader

# 7️⃣ Ensure Node.js Installed
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && apt-get install -y nodejs

# 8️⃣ Install Frontend Dependencies
RUN npm install 

# 9️⃣ Build Tailwind & Vite
RUN npm run build 

# Ensure Public Directory Exists
RUN mkdir -p /var/www/public/build && chmod -R 777 /var/www/public/build

# 🔟 Set Correct Permissions
RUN chmod -R 777 storage bootstrap/cache

# 1️⃣1️⃣ Expose Port 10000
EXPOSE 10000

# 1️⃣2️⃣ Start Laravel Server & Vite (Fix for CSS)
CMD ["sh", "-c", "npm run build && php -S 0.0.0.0:10000 -t public"]
# 1. Gunakan image dasar PHP versi Apache
FROM php:8.4-apache

# 2. Instal dependensi sistem dasar dan ekstensi PHP
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev \
    git curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql zip gd mbstring bcmath

# 3. Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Aktifkan mod_rewrite Apache (dibutuhkan untuk routing Laravel)
RUN a2enmod rewrite

# 5. Arahkan document root Apache ke folder public/ milik Laravel
RUN sed -i 's!/var/www/html!/var/www/public!g' /etc/apache2/sites-available/000-default.conf
RUN sed -i 's!/var/www/!/var/www/public!g' /etc/apache2/apache2.conf

# 5b. Izinkan .htaccess override agar routing Laravel berfungsi
RUN { \
    echo '<Directory /var/www/public>'; \
    echo '    Options Indexes FollowSymLinks'; \
    echo '    AllowOverride All'; \
    echo '    Require all granted'; \
    echo '</Directory>'; \
} >> /etc/apache2/apache2.conf

# 6. Tetapkan direktori kerja utama di dalam container
WORKDIR /var/www

# 7. Salin seluruh source code project ke dalam container
COPY . .

# 8. Install dependency PHP (Laravel) via Composer
RUN composer install --no-interaction --optimize-autoloader

# 9. Atur permission agar Laravel bisa menulis ke storage & cache
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 storage bootstrap/cache

# 10. Expose port default Apache
EXPOSE 80

FROM php:8.2-fpm

# Установка системных зависимостей
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql mbstring zip xml

# Установка Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Копирование конфигов PHP и Xdebug
COPY php/php.ini /usr/local/etc/php/php.ini
COPY php/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Установка рабочего каталога
WORKDIR /var/www/html

FROM php:8.2-fpm

ARG UID
ARG GID

RUN addgroup --gid $GID appgroup && \
    adduser --disabled-password --gecos "" --uid $UID --gid $GID appuser

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    libonig-dev \
    libxml2-dev \
    libbrotli-dev \
    pkg-config \
    gcc \
    make \
    autoconf \
    libc-dev \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql mbstring zip xml pcntl

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN pecl channel-update pecl.php.net \
    && pecl install swoole \
    && docker-php-ext-enable swoole

COPY php.ini /usr/local/etc/php/php.ini
COPY docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN chmod 777 /tmp

USER appuser

WORKDIR /var/www/html

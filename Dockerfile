FROM php:8.3-fpm-alpine

# Niezbędne biblioteki systemowe i rozszerzenia PHP pod Symfony + MySQL
RUN apk add --no-cache \
    icu-dev \
    libzip-dev \
    oniguruma-dev \
    git \
    unzip \
    $PHPIZE_DEPS \
    && docker-php-ext-install -j$(nproc) \
    pdo_mysql \
    intl \
    zip \
    opcache

# Instalacja Composera
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Katalog cache i logów Symfony
RUN mkdir -p var/cache var/log && chown -R www-data:www-data var
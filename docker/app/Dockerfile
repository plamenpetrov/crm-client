FROM php:7.3.0-fpm

# Pre-requisites installation
RUN apt-get update \
   && apt-get install -y libmcrypt-dev curl mcrypt git unzip zlib1g-dev libzip-dev zip \
   && pecl install mcrypt-1.0.2 \
   && docker-php-ext-install pdo_mysql bcmath zip \
   && docker-php-ext-enable mcrypt bcmath pdo_mysql sodium zip

# Composer installation
COPY --from=composer /usr/bin/composer /usr/bin/composer

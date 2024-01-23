FROM php:8.3.2-fpm-bullseye

# Install system dependencies
RUN apt-get update && apt-get install -y git zip unzip 

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# allow super user to use composer
ENV COMPOSER_ALLOW_SUPERUSER 1

# Get composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# copy composer files
COPY composer.* .

# copy app files
COPY . .

# Install composer dependencies
RUN composer install --prefer-dist --no-dev --no-scripts --no-progress --no-interaction

# run and optmize composer autoloader
RUN composer dump-autoload --optimize

# set working directory
WORKDIR /var/www/html
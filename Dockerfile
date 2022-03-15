FROM php:8.0-apache as local
ENV TZ="UTC"
ENV APACHE_DOCUMENT_ROOT="/app/public"

RUN a2enmod rewrite
RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY --chown=root:root docker/php/php.ini /usr/local/etc/php/php.ini
COPY --chown=root:root docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY --chown=www-data:www-data . /app

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

WORKDIR /app

RUN composer install --no-interaction --no-ansi -o

FROM php:8.2-fpm

WORKDIR /app
ENV COMPOSER_ALLOW_SUPERUSER=1 
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY composer.json composer.lock package.json .

RUN composer --version && composer install

COPY . .

RUN chmod -R 775 storage

CMD ["php", "artisan", "serve"]
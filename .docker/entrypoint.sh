#!/bin/bash
chown -R www-data:www-data .
composer install
php artisan key:generate
php artisan migrate
pecl install xdebug

php-fpm



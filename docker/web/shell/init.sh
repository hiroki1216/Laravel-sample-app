#!/bin/bash

composer update && composer install
npm install
php artisan migrate --force
php artisan db:seed --force
supervisord -c /etc/supervisor/supervisord.conf
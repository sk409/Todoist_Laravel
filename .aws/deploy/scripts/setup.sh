#!/bin/bash

cp ~/app/.env /var/www/html/Todoist

cd "/var/www/html/Todoist"
export HOME=/root
/usr/local/bin/composer install
npm install
php artisan migrate
sudo chmod -R 777 storage
sudo chmod -R 775 bootstrap/cache
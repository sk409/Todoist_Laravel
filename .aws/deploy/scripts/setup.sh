#!/bin/bash

cp ~/app/.env /var/www/html/Todoist

cd "/var/www/html/Todoist"

HOME=/root

/usr/local/bin/composer install
#!/bin/bash

cp ~/app/.env /var/www/html/Todoist

cd "/var/www/html/Todoist"

/usr/local/bin/composer install
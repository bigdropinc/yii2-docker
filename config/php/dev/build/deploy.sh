#!/usr/bin/env bash
php init --env=Development --overwrite=All
composer install
while ! mysqladmin ping -h "mysql" --password="root" --user="root" --silent; do
    echo "Waiting for mysql...";
    sleep 1;
done
sleep 5

php yii migrate/up --interactive=0
php yii config/init
php-fpm

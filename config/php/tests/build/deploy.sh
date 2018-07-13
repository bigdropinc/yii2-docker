#!/usr/bin/env bash
php init --env=Testing --overwrite=All
composer install
while ! mysqladmin ping -h "mysql_test" --password="root" --user="root" --silent; do
    echo "Waiting for mysql...";
    sleep 1;
done
sleep 5

php yii migrate/up --interactive=0
php yii config/init
echo "\nYour application ready.\n"
php-fpm

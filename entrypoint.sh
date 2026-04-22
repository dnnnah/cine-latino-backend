#!/bin/sh
php artisan migrate --force
php artisan db:seed --class=MoviesTableSeeder --force
php artisan serve --host=0.0.0.0 --port=8080

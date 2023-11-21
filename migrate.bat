@echo off
php artisan migrate
php artisan permission:create-role admin
php artisan permission:create-role User
pause
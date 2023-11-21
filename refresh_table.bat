@echo off
php artisan migrate:fresh --seed
php artisan permission:create-role admin
php artisan permission:create-role User
pause
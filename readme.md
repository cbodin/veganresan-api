# Veganresan API

A [Lumen](https://lumen.laravel.com/docs) REST-API for the "Veganresan" mobile application. Endpoints for adding and
listing meals with authorization is available.

## Installation
1. Install all dependencies `composer install`
2. Ensure `/storage` folder is writable by the webserver
3. Create a sqlite database file `touch database/database.sqlite`
4. Copy `.env.example` to `.env` and update all variables
5. Ensure symlink from `/public/storage` to `/storage/app/public` exists, if not, create it: `ln -s ../storage/app/public/ ./public/storage`
6. Run migrations `php artisan migrate`

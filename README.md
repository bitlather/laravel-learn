Laravel - Installation
======================
http://laravel.com/docs/installation

Install composer:

    curl -sS https://getcomposer.org/installer | php

Create laravel project:

    php composer.phar create-project laravel/laravel --prefer-dist


Run project
-----------

Start server:

    cd laravel
    php artisan serve

View in browser:

    http://localhost:8000

Steps to create authentication
------------------------------

* Create database for app.
* Set database credentials in _app/config/database.php_.
* Create user migration using `php artisan migrate:make create_users_table`
* Create schema for users table in _app/database/migrations/yyy_mm_dd_tttttt_create_users_table.php_
* Run migration using `php artisan migrate`
* Create routes in _app/routes.php_
* Update routing filters in _app/filters.php_ if necessary
* Create layouts and views in _app/views_

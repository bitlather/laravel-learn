Summary
=======

The branches in this repo show basic development using Laravel Framework version 4.1.24.

This branch shows the basics of user sign up, log in, and log out using Laravel Framework version 4.1.24.


Install Laravel
---------------
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

* Create database for app - this code uses laravel_learn
* Set database credentials in *app/config/database.php*
* Create user migration using `php artisan migrate:make create_users_table`
* Create schema for users table in *app/database/migrations/yyy_mm_dd_tttttt_create_users_table.php*
* Run migration using `php artisan migrate`
* Create routes in *app/routes.php*
* Update routing filters in *app/filters.php* if necessary
* Create layouts and views in *app/views*
* Update users model to add creation validator in *app/models/User.php*

Challenges:

* Create an account. Stay logged in. In database, set *is_active* to 0. Browse to a new page. User should be kicked out.
* Add meaningful validation messages to log in screen when log in fails.

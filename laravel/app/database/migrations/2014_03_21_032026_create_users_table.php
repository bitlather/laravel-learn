<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    public function up(){
        # http://laravel.com/docs/schema
        Schema::create('users', function($table){
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->text('password');
            # The user level salt is also stored in the password.
            $table->boolean('is_active');
            # You may also want to capture whether user has confirmed email
            # and have reset token and reset expiration date in case they
            # forget their password.
            $table->timestamps();
        });
    }

    public function down(){
        Schema::drop('users');
    }

}

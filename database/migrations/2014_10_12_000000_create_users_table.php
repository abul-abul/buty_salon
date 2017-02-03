<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('username')->nullable();
            $table->string('phone')->nullable();
            $table->string('profile_picture')->nullable();
            $table->integer('salon_id')->default(0);
            $table->string('profession')->nullable();
            $table->integer('salon_admin_id')->default(0);
            $table->enum('role', ['user','main-admin','salon_admin','salon_worker']);
            $table->integer('category_id')->nullable();
            $table->enum('activ_inactive', ['active','inactive'])->nullable();
            $table->string('active_user')->default(false);
            $table->string('email')->unique();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('facebook_token')->nullable();
            $table->string('google_id')->nullable();
            $table->string('google_token')->nullable();
            $table->string('password');
            $table->string('description')->nullable();
            $table->string('hash')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}

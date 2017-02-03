<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('worker_id')->unsigned();
            $table->integer('salon_id')->unsigned();
            $table->integer('service_id');
            $table->datetime('date'); 
            $table->longText('message');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
            $table->foreign('worker_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('salon_id')
                  ->references('id')
                  ->on('salons')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notification');
    }
}

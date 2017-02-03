<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalonRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salon_rating' , function(Blueprint $table)
        {
            $table ->increments('id');
            $table ->integer('user_id');
            $table ->integer('salon_id')->unsigned();
            $table ->integer('worker_id');
            $table ->integer('service_id');
            $table ->integer('salon_rating')->nullable();
            $table ->integer('worker_rating')->nullable();
            $table ->integer('service_rating')->nullable();
            $table ->timestamps();
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
        Schema::drop('salon_rating');
    }
}

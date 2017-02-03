<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalonServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salons', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('sub_domain')->unique()->nullable();
            $table->string('position')->nullable();
            $table->string('salon_email')->nullable();
            $table->string('phonenumber')->nullable();
            $table->string('image')->nullable();
            $table->longText('description_am')->nullable();
            $table->longText('description_ru')->nullable();
            $table->longText('description_en')->nullable();
            $table->string('workings_time_days')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('slide_active')->default(false);
            $table->boolean('salon_status')->default(false);
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
        Schema::drop('salons');
    }
}

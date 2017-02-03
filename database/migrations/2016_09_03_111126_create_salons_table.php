<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('salonservices', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('services')->nullable();
            $table->string('service_prices_min')->nullable();
            $table->string('service_prices_max')->nullable();
            $table->integer('salon_admin_id');
            $table->string('discount')->nullable();
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
         Schema::drop('salonservices');
    }
}

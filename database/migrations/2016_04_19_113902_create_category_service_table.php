<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoryservice', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('salon-id')->unsigned();
            $table->integer('salon-category-id');
            $table->integer('salon-service-id');
            $table->timestamps();
            $table->foreign('salon-id')
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
        Schema::drop('categoryservice');
    }
}

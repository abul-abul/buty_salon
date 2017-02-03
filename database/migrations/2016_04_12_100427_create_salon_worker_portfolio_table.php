<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalonWorkerPortfolioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salon_worker_portfolio', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('worker_id')->unsigned();
            $table->string('certificate')->nullable();
            $table->string('diploma')->nullable();
            $table->timestamps();
            $table->foreign('worker_id')
                  ->references('id')
                  ->on('users')
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
        Schema::drop('salon_worker_portfolio');
    }
}

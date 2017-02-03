<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('albums', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('worker_id')->unsigned();
            $table->string('album_name');
            $table->string('album_prof_pic')->nullable();
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
        Schema::drop('albums');
    }
}

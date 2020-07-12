<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('vote',function(Blueprint $bp){
            $bp->increments('id');
            $bp->integer('id_pertanyaan')->unsigned();
            $bp->integer('id_user')->unsigned();
            $bp->timestamps();
            $bp->integer('score');

            $bp->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $bp->foreign('id_pertanyaan')->references('id')->on('pertanyaan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('vote');
    }
}

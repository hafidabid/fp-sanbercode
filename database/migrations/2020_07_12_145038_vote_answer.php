<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VoteAnswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_answer',function(Blueprint $bp){
            $bp->increments('id');
            $bp->integer('id_jawaban');
            $bp->integer('id_user');
            $bp->timestamps();
            $bp->integer('score');

            $bp->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $bp->foreign('id_jawaban')->references('id')->on('jawaban')->onDelete('cascade');
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
        Schema::drop('vote_answer');
    }
}

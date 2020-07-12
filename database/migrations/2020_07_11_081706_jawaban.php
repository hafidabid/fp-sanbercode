<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jawaban extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('jawaban',function (Blueprint $table){
            $table->increments('id'); 
            $table->string('judul');
            $table->string('isi');
            //$table->integer('id_user');
            $table->timestamps();
            $table->integer('id_user')->unsigned();
            $table->integer('id_pertanyaan')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_pertanyaan')->references('id')->on('pertanyaan')->onDelete('cascade');
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
        Schema::drop('jawaban');
    }
}

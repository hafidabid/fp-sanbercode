<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KomentarJawaban extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('komentar_jawaban',function (Blueprint $table){
            $table->increments('id');
            $table->string('isi');
            //$table->integer('id_user');
            $table->timestamps();
            $table->integer('id_user')->unsigned();
            $table->integer('id_jawaban')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_jawaban')->references('id')->on('jawaban')->onDelete('cascade');
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
        Schema::drop('komentar_jawaban');
    }
}

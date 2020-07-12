<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pertanyaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pertanyaan',function (Blueprint $table){
            $table->increments('id'); 
            $table->string('judul');
            $table->string('isi');
            //$table->integer('id_user');
            $table->timestamps();
            $table->integer('id_user')->unsigned();
            
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('pertanyaan');
    }
}

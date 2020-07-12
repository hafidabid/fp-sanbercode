<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jawaban extends Model
{
    //
    protected $table ='jawaban';

    public function pertanyaan(){
        return $this->belongsTo('App\pertanyaan');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function komentar_jawabans(){
        return $this->hasMany('App\komentar_jawaban');
    }

}

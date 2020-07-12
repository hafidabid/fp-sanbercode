<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pertanyaan extends Model
{
    //
    protected $table= 'pertanyaan'; 
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function jawabans(){
        return $this->hasMany('App\jawaban');
    }

    public function komentar_pertanyaans(){
        return $this->hasMany('App\komentar_pertanyaan');
    }
}

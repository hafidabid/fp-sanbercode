<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class komentar_jawaban extends Model
{
    //
    protected $table = 'komentar_jawaban';

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function jawaban(){
        return $this->belongsTo('App\jawaban');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class komentar_pertanyaan extends Model
{
    protected $table = "komentar_pertanyaan";
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function pertanyaan(){
        return $this->belongsTo('App\pertanyaan');
    }
}

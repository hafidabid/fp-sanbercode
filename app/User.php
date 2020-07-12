<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pertanyaans(){
        return $this->hasMany('App\pertanyaan');
    }

    public function jawabans(){
        return $this->hasMany('App\jawabans');
    }

    public function komentar_pertanyaans(){
        return $this->hasMany('App\komentar_pertanyaan');
    }

    public function komentar_jawabans(){
        return $this->hasMany('App\komentar_jawaban');
    }
}

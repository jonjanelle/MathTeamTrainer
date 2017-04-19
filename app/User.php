<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Problem;

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

    /*
     * Define one-to-many between user and comments
     */
    public function comments() {
      return $this->hasMany('App\Comment')->orderBy('created_at', 'DESC');
    }

    public function problems() {
        return $this->belongsToMany('App\Problem')->withTimestamps();
    }


}

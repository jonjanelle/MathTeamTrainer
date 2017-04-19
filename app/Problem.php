<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Problem extends Model
{
  /*
   * Define one-to-many between problem and comments
   */
   public function comments() {
     return $this->hasMany('App\Comment')->orderBy('created_at', 'DESC');
   }

   public function users() {
       return $this->belongsToMany('App\User')->withTimestamps();
   }

}

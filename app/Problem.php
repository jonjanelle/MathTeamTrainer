<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
  /*
   * Define one-to-many between problem and comments
   */
   public function comments() {
     return $this->hasMany('App\Comment')->orderBy('created_at', 'DESC');
   }
}

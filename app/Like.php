<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*
 Primary purpose of Like table is to prevent user from
 repeatedly liking/disliking the same problem. Like/dislike counts
 are stored in Comment objects to avoid needing to count totals each session.
*/
class Like extends Model
{
  public function user() {
    return $this->belongsTo('App\User');
  }

  public function problem() {
    return $this->belongsTo('App\Problem');
  }
}

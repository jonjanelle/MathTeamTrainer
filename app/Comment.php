<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  /*
   Comment belongs to User
   Define an inverse one-to-many relationship.
  */
    public function user() {
      return $this->belongsTo('App\User');
	}

  /*
  Comment may have many likes (and dislikes)
  */
  public function likes() {
    return $this->hasMany('App\Like')->orderBy('created_at', 'DESC');
  }
  /*
    Comment also belongs to Problem
    Define an inverse one-to-many relationship.
  */
  public function problem() {
    return $this->belongsTo('App\Problem');
  }
}

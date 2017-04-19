<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user() {
		  # Comment belongs to User
		  # Define an inverse one-to-many relationship.
      return $this->belongsTo('App\User');
	}

  public function problem() {
    # Comment also belongs to Problem
    # Define an inverse one-to-many relationship.
    return $this->belongsTo('App\Problem');
  }
}

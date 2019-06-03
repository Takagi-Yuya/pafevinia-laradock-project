<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  protected $primaryKey = 'user_id';

  protected $guarded = ['user_id'];

  public static $rules = array(
    'content' => 'required'
  );

  Public function user()
  {
      return $this->belongsTo('App\User');
  }

  Public function profile()
  {
      return $this->belongsTo('App\Profile');
  }
}

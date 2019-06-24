<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name', 'email', 'content'
    ];

    public static $rules = array(
      'name' => 'required',
      'email' => 'required',
      'content' => 'required'
    );
}

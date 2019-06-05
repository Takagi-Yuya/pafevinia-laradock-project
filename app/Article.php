<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = array('id');

    protected $fillable = [
        'title', 'content', 'image_path',
    ];

    public static $rules = array(
      'title' => 'required',
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

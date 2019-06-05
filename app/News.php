<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = array('id');

    protected $fillable = [
        'content'
    ];

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

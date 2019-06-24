<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $primaryKey = 'user_id';

    protected $guarded = ['user_id'];

    public static $rules = array(
        'name' => 'required',
        'introduction' => 'required'
    );

    Public function user()
    {
        return $this->belongsTo('App\User');
    }

    Public function articles()
    {
        return $this->hasMany('App\Article', 'user_id');
    }
}

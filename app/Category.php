<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //primaryはtabelの主キー（自動的にidと名のつくものになる）
    //guardedはブラックリスト（代入できない）
    protected $guarded = array('id');

    protected $fillable = [
        'name'
    ];

    public static $rules = array(
        'name' => 'required'
    );

    public function articles()
    {
        return $this->hasMany('App\Article', 'category_id');
    }
}

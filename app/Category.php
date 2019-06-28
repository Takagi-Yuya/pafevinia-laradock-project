<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id';

    protected $fillable = 'name';

    public static $rules = array(
        'name' => 'required'
    );
}

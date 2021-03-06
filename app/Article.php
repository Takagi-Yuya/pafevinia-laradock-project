<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use cebe\markdown\Markdown as Markdown;

class Article extends Model
{
    protected $guarded = array('id');

    protected $fillable = [
        'title', 'body', 'image_path', 'user_id', 'category_id'
    ];

    public static $rules = array(
        'title' => 'required',
        'body' => 'required'
    );

    Public function user()
    {
        return $this->belongsTo('App\User');
    }

    Public function profile()
    {
        return $this->belongsTo('App\Profile', 'user_id');
    }

    Public function category()
    {
        return $this->belongsTo('App\Category');
    }

    //markdownのパース Articleモデルに自身のbodyをパースするためのparse()メソッドを追加
    public function parse()
    {
        $parser = new Markdown();

        return $parser->parse($this->body);
    }

    //テンプレートからモデルの属性値として取得できるように..
    public function getMarkdownBodyAttribute()
    {
        return $this->parse();
    }
}

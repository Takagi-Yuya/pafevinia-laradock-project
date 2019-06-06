<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use cebe\markdown\Markdown as Markdown;

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\User;
use App\News;
use App\Article;
use Illuminate\Support\Facades\Auth;
use Storage;

class SearchController extends Controller
{
    //like演算子で曖昧検索
    //Articleモデルのtitleとbodyカラム(orWhere関数でok?)、リレーションからuserとprofileのnameで検索（titleとbodyでカラムが別れているけどどうする？）
    public function search(Request $request)
    {
        $users = User::all();
        $profiles = Profile::all();
        $news = News::orderBy('created_at', 'desc')->paginate(6, ["*"], 'news-pn');
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $articles = Article::where('title', 'like', "%$keyword%")->orWhere('body', 'like', "%$keyword%");

            $articles_user = Article::whereHas('user', function ($query) use ($keyword)
            {
                $query->where('name', 'like', "%$keyword%");
            });

            $articles_profile = Article::whereHas('profile', function ($query) use ($keyword)
            {
                $query->where('name', 'like', "%$keyword%");
            });

            $articles = $articles->union($articles_user)->union($articles_profile)->orderBy('created_at', 'desc')->paginate(12, ["*"], 'articles-pn');
        } else {
            $articles = Article::orderBy('created_at', 'desc')->paginate(12, ["*"], 'articles-pn');
        }

        return view('home', ['profiles' => $profiles, 'users' => $users, 'news' => $news, 'articles' => $articles, 'keyword' => $keyword]);
    }
}

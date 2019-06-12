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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //ログイン不要で見られる
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $users = User::all();
        $profiles = Profile::all();
        $news = News::orderBy('created_at', 'desc')->paginate(6, ["*"], 'news-pn');//->appends(["articles-pn"=>$request->input('articles-pn')]);
        $articles = Article::orderBy('created_at', 'desc')->paginate(12, ["*"], 'articles-pn');//->appends(["news-pn"=>$request->input('news-pn')]);
        $keyword = null;

        return view('home', ['profiles' => $profiles, 'users' => $users, 'news' => $news, 'articles' => $articles, 'keyword' => $keyword]);
    }
}

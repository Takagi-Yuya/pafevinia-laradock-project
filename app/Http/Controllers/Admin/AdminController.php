<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\User;
use App\News;
use App\Article;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Storage;

class AdminController extends Controller
{
    public function list_of_function(Request $request)
    {
        $user = Auth::user();
        $profile = Profile::find($user->id);
        $news = News::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(6, ["*"], 'news-pn')->appends(["articles-pn"=>$request->input('articles-pn')]);
        $categories = Category::orderBy('created_at', 'desc')->get();
        $articles = Article::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(12, ["*"], 'articles-pn')->appends(["news-pn"=>$request->input('news-pn')]);

        return view('admin.admin_home', ['profile' => $profile, 'user' => $user, 'news' => $news, 'categories' => $categories, 'articles' => $articles]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\User;
use App\News;
use App\Article;
use Illuminate\Support\Facades\Auth;
use Storage;

class AdminController extends Controller
{
    public function list_of_function()
    {
        $user = Auth::user();
        $profile = Profile::find($user->id);
        
        $news = News::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(5);

        return view('admin.admin_home', ['profile' => $profile, 'user' => $user, 'news' => $news]);
    }
}

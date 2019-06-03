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

        return view('admin.admin_home', ['profile' => $profile, 'user' => $user]);
    }
}

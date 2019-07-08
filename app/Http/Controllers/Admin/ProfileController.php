<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\User;
use App\Article;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Storage;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = new Profile;
        $user = Auth::user();
        $profile->user_id = $user->id;
        $form = $request->all();

        if (isset($form['image'])) {
            $path = Storage::disk('s3')->putFile('/', $form['image'], 'public');
            $profile->image_path = Storage::disk('s3')->url($path);
        } else {
            $profile->image_path = null;
        }

        unset($form['_token'],$form['image']);

        $profile->fill($form)->save();

        return redirect('admin/admin_home');
    }

    public function edit()
    {
        $user = Auth::user();
        $profile = Profile::find($user->id);

        return view('admin.profile.edit', ['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->user_id);
        $profile_form = $request->all();

        if (isset($profile_form['image'])) {
            $path = Storage::disk('s3')->putFile('/', $profile_form['image'], 'public');
            $profile->image_path = Storage::disk('s3')->url($path);
            unset($profile_form['image']);
        }

        if (isset($request->remove)) {
            $profile->image_path = null;
            unset($profile_form['remove']);
        }

        unset($profile_form['_token']);

        $profile->fill($profile_form)->save();

        return redirect('admin/admin_home');
    }

    public function show(Request $request)
    {
        $user = User::find($request->id);
        $articles = Article::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(12);
        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('personal.show', ['user' => $user, 'articles' => $articles, 'categories' => $categories]);
    }
}

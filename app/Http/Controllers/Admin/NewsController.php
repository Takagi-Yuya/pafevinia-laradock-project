<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Profile;
use App\User;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function add()
    {
        return view('admin.news.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, News::$rules);
        $news = new News;
        $user = Auth::user();
        $news->user_id = $user->id;
        $form = $request->all();

        unset($form['_token']);

        $news->fill($form)->save();

        return redirect('admin/admin_home');
    }

    public function edit(Request $request)
    {
        $news = News::where('id', $request->id)->first();

        return view('admin.news.edit', ['news_form' => $news]);
    }

    public function update(Request $request)
    {
        $this->validate($request, News::$rules);

        $news = News::where('id', $request->id)->first();
        $news_form = $request->all();

        unset($news_form['_token']);

        $news->fill($news_form)->save();

        return redirect('admin/admin_home');
    }

    public function delete(Request $request)
    {
        $news = News::where('id', $request->id)->delete();

        return redirect('admin/admin_home');
    }
}

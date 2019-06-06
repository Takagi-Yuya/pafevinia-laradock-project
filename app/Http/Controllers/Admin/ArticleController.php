<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Profile;
use App\User;
use Illuminate\Support\Facades\Auth;
use Storage;

class ArticleController extends Controller
{
    public function add()
    {
        return view('admin.article.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Article::$rules);
        $articles = new Article;
        $user = Auth::user();
        $articles->user_id = $user->id;
        $form = $request->all();

        if (isset($form['image'])) {
            $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
            $articles->image_path = Storage::disk('s3')->url($path);;
        } else {
            $articles->image_path = null;
        }

        unset($form['_token']);
        unset($form['image']);

        $articles->fill($form)->save();

        return redirect('admin/admin_home');
    }

    public function edit(Request $request)
    {
        $article = Article::where('id', $request->id)->first();

        return view('admin.article.edit', ['article_form' => $article]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Article::$rules);

        $article = Article::where('id', $request->id)->first();
        $article_form = $request->all();

        if (isset($article_form['image'])) {
            $path = Storage::disk('s3')->putFile('/',$article_form['image'],'public');
            $article->image_path = Storage::disk('s3')->url($path);;
            unset($article_form['image']);
        }

        if (isset($request->remove)) {
            $article->image_path = null;
            unset($article_form['remove']);
        }

        unset($article_form['_token']);

        $article->fill($article_form)->save();

        return redirect('admin/admin_home');
    }

    public function delete(Request $request)
    {
        $article = Article::where('id', $request->id)->delete();

        return redirect('admin/admin_home');
    }
}

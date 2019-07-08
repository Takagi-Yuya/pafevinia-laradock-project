<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Profile;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Storage;

class ArticleController extends Controller
{
    public function add()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('admin.article.create', ['categories_form' => $categories]);
    }

    public function create(Request $request)
    {
        $this->validate($request, Article::$rules);
        $articles = new Article;
        $user = Auth::user();
        $articles->user_id = $user->id;
        $form = $request->all();

        if (!isset($form['category_id'])) {
            $articles->category_id = null;
        }

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
        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('admin.article.edit', ['article_form' => $article, 'categories_form' => $categories]);
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

    //記事毎の個別表示
    public function show(Request $request)
    {
        $article = Article::with(['user', 'profile'])->where('id', $request->id)->first();
        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('article.show', ['article' => $article, 'categories' => $categories]);
    }
}

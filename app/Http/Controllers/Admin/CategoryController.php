<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Article;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function add()
    {
        return view('admin.category.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Category::$rules);
        $category = new Category;
        $form = $request->all();

        unset($form['_token']);

        $category->fill($form)->save();

        return redirect('admin/admin_home');
    }

    public function edit(Request $request)
    {
        $category = Category::where('id', $request->id)->first();

        return view('admin.category.edit', ['category_form' => $category]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Category::$rules);

        $category = Category::where('id', $request->id)->first();
        $category_form = $request->all();

        unset($category_form['_token']);

        $category->fill($category_form)->save();

        return redirect('admin/admin_home');
    }

    public function delete(Request $request)
    {
        //カテゴリーの削除と同時に紐付く記事のcategory_idをnullに書き換える。
        Article::where('category_id', $request->id)->update(['category_id' => null]);
        $category = Category::where('id', $request->id)->delete();

        return redirect('admin/admin_home');
    }
}

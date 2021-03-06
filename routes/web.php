<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
    //return view('welcome');
//});

//warningを出さない仕様に変更
//↓↓↓
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

Auth::routes();

//認証無しで閲覧可能
//↓↓
//TOPページ
Route::get('/', 'HomeController@index')->name('home');
//記事の個別ページ
Route::get('article/show', 'Admin\ArticleController@show');
//カテゴリー毎のページ(homeがテンプレ)
Route::get('category/list', 'Admin\CategoryController@index');
//personal
Route::get('personal/show', 'Admin\ProfileController@show');
//検索機能関係
Route::get('search', 'SearchController@search');
//お問い合わせフォーム(ゲスト)
Route::get('contact/create', 'ContactController@add');
Route::post('contact/create', 'ContactController@create');

//ここからは認証必須
//↓↓
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    //admin_home
    Route::get('admin_home', 'Admin\AdminController@list_of_function');
    //profile
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');
    //news
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');
    Route::get('news/edit', 'Admin\NewsController@edit');
    Route::post('news/edit', 'Admin\NewsController@update');
    Route::get('news/delete', 'Admin\NewsController@delete');
    //article
    Route::get('article/create', 'Admin\ArticleController@add');
    Route::post('article/create', 'Admin\ArticleController@create');
    Route::get('article/edit', 'Admin\ArticleController@edit');
    Route::post('article/edit', 'Admin\ArticleController@update');
    Route::get('article/delete', 'Admin\ArticleController@delete');
    //contact
    Route::get('contact/show', 'ContactController@show');
    //category
    Route::get('category/create', 'Admin\CategoryController@add');
    Route::post('category/create', 'Admin\CategoryController@create');
    Route::get('category/edit', 'Admin\CategoryController@edit');
    Route::post('category/edit', 'Admin\CategoryController@update');
    Route::get('category/delete', 'Admin\CategoryController@delete');
});

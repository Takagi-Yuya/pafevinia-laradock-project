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

Auth::routes();

//認証無しで閲覧可能
//↓↓
//TOPページ
Route::get('/', 'HomeController@index')->name('home');
//記事の個別ページ
Route::get('article/show', 'Admin\ArticleController@show');
//personal
Route::get('personal/show', 'Admin\ProfileController@show');


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
});

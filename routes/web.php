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

Route::get('/', function () {
    return view('articles');
});

Route::get('/', [
	'uses' => 'ArticleController@getArticles',
	'as' => 'articles'
]);

Route::get('/registration', function () {
    return view('registration');
});

Route::post('/registration', [
	'uses' => 'UserController@postRegistration',
	'as' => 'registration'
]);

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [
	'uses' => 'UserController@postLogin',
	'as' => 'login'
]);

Route::get('/logout', [
	'uses' => 'UserController@getLogout',
	'as' => 'logout'
]);

Route::post('/create-article', [
	'uses' => 'ArticleController@postCreateArticle',
	'as' => 'article.create'
]);

Route::post('/edit', [
	'uses' => 'ArticleController@postEditArticle',
	'as' => 'edit'
]);

Route::get('/delete-article/{article_id}', [
	'uses' => 'ArticleController@getDeleteArticle',
	'as' => 'article.delete'
]);
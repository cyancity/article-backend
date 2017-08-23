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

Auth::routes();
Route::get('/', 'ArticleController@index');
Route::get('/home', 'HomeController@index');
Route::resource('article','ArticleController');
Route::post('article/edit','ArticleController@edit');
Route::any('article/update/{id}','ArticleController@update');
Route::get('article/delete/{id}','ArticleController@destroy');
Route::any('/news', 'NewsController@index');
Route::get('/show/{id}','NewsController@show');
Route::get('/topic','TopicController@index');
Route::get('/category','CategoryController@index');
Route::get('category/edit/{id}', 'CategoryController@edit');
Route::post('/category/update','CategoryController@update');
Route::post('/topic','TopicController@store');
Route::get('/topic/create','TopicController@create');
Route::get('/topic/destory/{id}','TopicController@destoty');
Route::get('/news/tabs/{tabs}','NewsController@tabs');
Route::get('/news/show/{id}','NewsController@show');
Route::get('/category/','CategoryController@add');
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
Route::get('/home', 'ArticleController@index');

Route::get('/', 'ArticleController@index');
Route::resource('article','ArticleController');
Route::post('article/edit','ArticleController@edit');
Route::any('article/update/{id}','ArticleController@update');
Route::get('article/delete/{id}','ArticleController@destroy');



Route::get('/category','CategoryController@index');
Route::get('category/edit/{id}', 'CategoryController@edit');
Route::get('category/edit-url/{id}', 'CategoryController@editUrl');
Route::post('/category/update','CategoryController@update');
Route::post('/category/update-url','CategoryController@updateUrl');
Route::get('/category','CategoryController@index');
Route::get('/category/create','CategoryController@create')->name('category.create');
Route::post('/category/store','CategoryController@store');

Route::any('/news', 'NewsController@index');
Route::get('/show/{id}','NewsController@show');
Route::get('/news/tabs/{tabs}','NewsController@tabs');
Route::get('/news/show/{id}','NewsController@show');
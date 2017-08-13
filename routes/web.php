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
Route::get('/home', 'ArticleController@index')->name('home');
Route::resource('article','ArticleController');
Route::post('article/edit','ArticleController@edit');
Route::any('article/update/{id}','ArticleController@update');
Route::get('article/delete/{id}','ArticleController@destroy');
Route::any('/news', 'NewsController@index');
Route::get('/show/{id}','NewsController@show');

<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('contents', 'ArticleController@getContents');
Route::get('tab-items', 'CategoryController@getTabbarItems');
Route::get('nav', 'CategoryController@getNav');

Route::get('news/sub/{pid}', 'NewsController@sub');

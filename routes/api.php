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

// 返回前端列表数据和分页数据
Route::get('pagination', 'ArticleController@getCellAndPagination');
// 返回首页 tabbar 数据
Route::get('tab-items', 'CategoryController@getTabbarItems');
// 返回首页右上角下拉框信息
Route::get('nav', 'CategoryController@getNav');
//

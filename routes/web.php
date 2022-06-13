<?php

use Illuminate\Support\Facades\Route;


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

Route::prefix('admin')->namespace('Admin')->name('admin_')->group(function (){
    //新着情報一覧
    Route::get('news', 'NewsController@index')->name('news');
    //新着情報登録・編集
    Route::get('news/edit/{news?}', 'NewsController@edit')->name('news_edit');
    Route::post('news/edit/{news?}', 'NewsController@store')->name('news_store');
    Route::delete('news', 'NewsController@delete')->name('news_delete');
});

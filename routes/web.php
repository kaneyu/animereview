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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mypage', 'HomeController@mypage');

Route::get('/anime/create', 'PostController@create');
Route::post('/anime/store', 'PostController@store');
Route::get('/anime/show/{post}', 'PostController@show');
Route::get('/anime/index', 'PostController@index');
Route::get('/anime/search', 'PostController@search');
Route::delete('/anime/delete/{post}', 'PostController@destroy');
Route::post('anime/restore/{deletedanime}', 'PostController@restore');
Route::delete('anime/forcedelete/{deletedanime}', 'PostController@forcedelete');

Route::Post('/favorate/store/{post}', 'FavorateController@store');
Route::delete('/favorate/destroy/{post}', 'FavorateController@destroy');

Route::Post('/good/store/{post}', 'GoodController@store');
Route::delete('/good/destroy/{post}', 'GoodController@destroy');

Route::get('/rank/index', 'AnimegenreController@index');
Route::get('/rank/show/{post}', 'GoodController@show');

Route::post('/view/store/{post}', 'ViewpostController@store');
Route::delete('/view/delete/{post}', 'ViewpostController@destroy');

Route::post('/reply/store/{post}', 'ReplyController@store');
Route::delete('/reply/delete/{post}', 'ReplyController@destroy');
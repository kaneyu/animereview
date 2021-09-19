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

Route::get('/anime/create', 'PostController@create');
Route::post('/anime/store', 'PostController@store');
Route::get('/anime/show/{post}', 'PostController@show');
Route::get('/anime/index', 'PostController@index');
Route::get('/anime/search', 'PostController@search');

Route::Post('/favorate/store/{post}', 'FavorateController@store');
Route::delete('/favorate/destroy/{post}', 'FavorateController@destroy');

Route::get('anime/rank', 'AnimegenreController@index');
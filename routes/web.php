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

Route::get('/home', 'UserController@storeSession');

Route::get('/', 'GeneralController@index');

Route::get('/search', 'GeneralController@search');

Route::get('/trending', 'GeneralController@trending');

Route::get('/upcoming', 'GeneralController@upcoming');

Route::get('/page-film/{id}', 'FilmController@index');

Route::get('/best-scifi', 'FilmController@sciFi');

Route::get('/best-adventure', 'FilmController@adventure');

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

Route::get('/account', 'UserController@ratedMovies')->middleware('auth');

Route::get('/profile', 'UserController@profile')->middleware('auth');

Route::post('/profile', 'UserController@updateProfile');

Route::post('/delete-user', 'UserController@deleteProfile');

Route::get('/tk-generation', 'UserController@storeSession')->middleware('auth');

Route::get('/create-list', 'ListsController@createList')->middleware('auth');

Route::post('/thankyou', 'ListsController@createLists')->middleware('auth');

Route::get('/lists', 'ListsController@index')->middleware('auth');

Route::post('/lists', 'ListsController@deleteMovie')->middleware('auth');

Route::post('/thankyou-list', 'ListsController@deleteLists')->middleware('auth');

Route::get('/', 'GeneralController@index');

Route::get('/search', 'GeneralController@search');

Route::get('/trending', 'GeneralController@trending');

Route::get('/upcoming', 'GeneralController@upcoming');

Route::get('/best-of', 'GeneralController@bestOf');

Route::get('/privacy-cookie', 'GeneralController@privacyCookie');

Route::get('/page-film/{id}', 'FilmController@index');

Route::post('/page-film/{id}','UserController@storeratingRequest');

Route::post('/page-film/{id}', 'ListsController@updateMovie')->middleware('auth');

Route::get('/best-scifi', 'FilmController@sciFi');

Route::get('/best-adventure', 'FilmController@adventure');

Route::get('/best-action', 'FilmController@action');

Route::get('/best-comedy', 'FilmController@comedy');

Route::get('/best-animation', 'FilmController@animation');

Route::get('/best-fantasy', 'FilmController@fantasy');

Route::get('/best-documentary', 'FilmController@documentary');

Route::get('/best-horror', 'FilmController@horror');

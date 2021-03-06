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

/*
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::resource('posts','PostsController');

*/
Auth::routes();
//simple pages
Route::get('/','PagesController@index');
Route::get('dictionaryRandom','PagesController@dictionaryRandom');
Route::fallback('PagesController@fallback');

//user home
//disabled home for the moment
//Route::get('home', 'HomeController@index')->name('home');
Route::get('home','PostsController@index')->middleware('auth');
//user management
Route::resource('users','UsersController')->middleware('auth');
/*
Route::get('users/{id}','UsersController@show')->middleware('auth');
Route::get('users/{id}/edit','UsersController@edit')->middleware('auth');
Route::put('users/{id}/update','UsersController@update')->middleware('auth');
Route::match(['put','patch'],'users/{id}/update','UsersController@update')->middleware('auth');
Route::get('users','UsersController@index')->middleware('auth');
*/
//contact form
Route::get('contact','ContactFormController@create');
Route::post('contact','ContactFormController@store');

//posts pages
//public shows public post from everybody
Route::get('posts/public','PostsController@viewPublic')->middleware('auth');
//friends shows all of friends posts
Route::get('posts/friends','PostsController@viewFriends')->middleware('auth');
//index shows only your posts
Route::resource('posts','PostsController')->middleware('auth');



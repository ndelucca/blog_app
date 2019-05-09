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
Route::fallback('PagesController@fallback');

//user home
Route::get('home', 'HomeController@index')->name('home');

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
Route::get('posts/public','PostsController@viewPublic');
Route::get('posts/friends','PostsController@viewFriends');

Route::resource('posts','PostsController')->middleware('auth');



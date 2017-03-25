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
    return view('public.home');
});

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('auth.login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('auth.logout');

Route::group(['prefix' => 'events'],function(){
	Route::get('/list', 'EventController@listEvents')->name('events.list');
	Route::get('/{slug}/register', 'EventController@registerToEvent')->name('events.register');
	Route::get('/{slug}/register/{id}', 'EventController@showRegistrationForm')->name('complete.register');
	Route::post('/{slug}/register/{id}', 'EventController@register')->name('register');
	Route::get('/{slug}/registered/success', 'EventController@successRegister')->name('register.success');
});


Route::get('/facebook', function(){
	return view('auth.facebook');
});

Route::get('auth/facebook', 'SocialController@redirectToProvider')->name('auth.facebook');
Route::get('auth/facebook/callback', 'SocialController@handleProviderCallback')->name('auth.callback');

Route::group(['prefix' => 'admin'], function(){
	Route::get('/events/', 'Crud\EventController@index')->name('crud.events.index');
	Route::get('/events/show/{id}', 'Crud\EventController@show')->name('crud.events.show');
	Route::get('/events/create', 'Crud\EventController@create')->name('crud.events.create');
	Route::post('/events/storage', 'Crud\EventController@storage')->name('crud.events.storage');
	Route::get('/events/edit/{id}', 'Crud\EventController@edit')->name('crud.events.edit');
	Route::post('/events/update/{id}', 'Crud\EventController@update')->name('crud.events.update');
	Route::get('/events/delete/{id}', 'Crud\EventController@delete')->name('crud.events.delete');

	Route::get('/users/', 'UserManagmentController@index')->name('users.index');
	Route::get('/users/show/{id}', 'UserManagmentController@show')->name('users.show');
});

Route::get('/home', 'HomeController@index');
Route::get('/prueba/conekta', 'HomeController@pruebaConekta');

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
    return redirect()->route('courses.list');
});

Route::group(['prefix' => 'courses'],function(){
	Route::get('/list', 'PublicController@listCourses')->name('courses.list');
	Route::get('/{slug}/register', 'PublicController@registerToCourse')->name('courses.register');
});


Route::get('/facebook', function(){
	return view('auth.facebook');
});

Route::get('auth/facebook', 'SocialiteController@redirectToProvider')->name('auth.facebook');
Route::get('auth/facebook/callback', 'SocialiteController@handleProviderCallback')->name('auth.callback');

Route::get('/complete/register/{id}', 'Auth\RegisterController@showRegistrationForm')->name('complete.register');
Route::post('/complete/register/{id}', 'Auth\RegisterController@register')->name('register');
// Auth::routes();

Route::get('/home', 'HomeController@index');

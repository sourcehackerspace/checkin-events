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
	Route::get('/list', 'CourseController@listCourses')->name('courses.list');
	Route::get('/{slug}/register', 'CourseController@registerToCourse')->name('courses.register');
	Route::get('/{slug}/register/{id}', 'CourseController@showRegistrationForm')->name('complete.register');
	Route::post('/{slug}/register/{id}', 'CourseController@register')->name('register');
	Route::get('/{slug}/registered/success', 'CourseController@successRegister')->name('register.success');
});


Route::get('/facebook', function(){
	return view('auth.facebook');
});

Route::get('auth/facebook', 'SocialController@redirectToProvider')->name('auth.facebook');
Route::get('auth/facebook/callback', 'SocialController@handleProviderCallback')->name('auth.callback');

Route::get('/home', 'HomeController@index');

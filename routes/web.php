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

Route::group(['prefix' => 'admin'], function(){
	Route::get('/courses/', 'Crud\CourseController@index')->name('crud.courses.index');
	Route::get('/courses/show/{id}', 'Crud\CourseController@show')->name('crud.courses.show');
	Route::get('/courses/create', 'Crud\CourseController@create')->name('crud.courses.create');
	Route::post('/courses/storage', 'Crud\CourseController@storage')->name('crud.courses.storage');
	Route::get('/courses/edit/{id}', 'Crud\CourseController@edit')->name('crud.courses.edit');
	Route::post('/courses/update/{id}', 'Crud\CourseController@update')->name('crud.courses.update');
	Route::get('/courses/delete/{id}', 'Crud\CourseController@delete')->name('crud.courses.delete');
});

Route::get('/home', 'HomeController@index');

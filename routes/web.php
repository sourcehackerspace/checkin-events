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

Route::get('auth/facebook', 'SocialiteController@redirectToProvider')->name('auth.facebook');
Route::get('auth/facebook/callback', 'SocialiteController@handleProviderCallback')->name('auth.callback');

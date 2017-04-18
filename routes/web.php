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
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

/*
 * Defines Guest Only Routes
 * We use this to stop people from accessing the Social Auth when they are already logged in..
 * */
Route::group(['middleware' => 'guest'],function() {
    Route::get('/auth/google', 'GoogleController@redirectToProvider');
    Route::get('/auth/google/callback', 'GoogleController@handleProviderCallback');
});

/*
 * Defines Logged-in Authenticated Access Only Routes
 * */
Route::group(['middleware' => 'auth'],function(){
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/profile', 'ProfileController@show')->name('profile');

    Route::get('/results', 'ResultController@index')->name('result.index');
    Route::group(['prefix' => 'result'],function() {
        Route::get('new', 'ResultController@create')->name('result.create');
        Route::post('new', 'ResultController@store')->name('result.store');
    });

    Route::group(['prefix' => 'exercise'],function() {
        Route::get('new', 'ExerciseController@create')->name('exercise.create');
        Route::post('new', 'ExerciseController@store')->name('exercise.store');
        Route::get('new', 'ExerciseController@create')->name('exercise.create');
    });

    Route::group(['prefix' => 'api'],function() {
        Route::get('exercise/search', 'ExerciseController@search')->name('exercise.search');
    });

});




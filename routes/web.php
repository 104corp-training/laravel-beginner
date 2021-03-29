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

//Route::get('/profile', function () {
//    return view('profile');
//});
Route::get('/profile', 'ProfileController@index');

Route::get('/profile/{coursePage}', 'CoursePageController@course');
Route::get('/test123', 'CoursePageController@index');

Route::get('/test', function(){
    return App\Models\Teacher::all();
});

Route::get('/profile/cache', 'ProfileController@cache');

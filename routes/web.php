<?php
use app\Models\Course;
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
Route::get('/course/{id}', 'PagesController@index');
Route::get('/course', 'CourseController@index');
Route::get('/course/cache', 'CourseController@cache');

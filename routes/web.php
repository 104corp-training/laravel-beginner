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
Route::get('/class/{id}', 'pagesController@index');
Route::get('/class', 'classController@index');
Route::get('/class/cache', 'classController@cache');

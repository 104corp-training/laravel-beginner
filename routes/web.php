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
use App\CourseStudent;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;

Route::get('/', 'WelcomeController@index');

Route::get('/{resources}/{target}', 'Controller@getRequest');

Route::post('/{resources}/{target}', 'Controller@postRequest');
<?php

use App\Exceptions\APIException;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware([])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware([])->prefix('course')->group(function () {
    Route::get('/', 'CourseController@index');
    Route::post('/', 'CourseController@store');
    Route::get('/{courseId}', 'CourseController@show');
    Route::put('/{courseId}', 'CourseController@update');
    Route::delete('/{courseId}', 'CourseController@destroy');
});

Route::middleware([])->prefix('coursestudy')->group(function () {
    Route::get('/', 'courseStudyController@index');
    Route::post('/', 'courseStudyController@store');
    Route::get('/{courseStudyid}', 'courseStudyController@show');
    Route::put('/{courseStudyId}', 'courseStudyController@update');
    Route::delete('/{courseStudyId}', 'courseStudyController@destroy');
});

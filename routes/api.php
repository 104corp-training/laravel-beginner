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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/profile/info', function () {
    return ['time' => Carbon\Carbon::now()];
});

Route::get('/course/{id}', function( $id ){
    $contents = DB::table('course')->where( 'id','=',strval($id) )->get();
    return $contents[0]->name . $contents[0]->id ;
});


//apiToken
Route::middleware([])->prefix('courses')->group(function () {
    Route::get('/', 'CourseController@index');
    Route::post('/', 'CourseController@store');
    Route::get('/{courseId}', 'CourseController@show');
    Route::put('/{courseId}', 'CourseController@update');
    Route::delete('/{courseId}', 'CourseController@destroy');
});

Route::middleware([])->prefix('comments')->group(function () {

    Route::get('/', 'CommentController@index');
    Route::post('/', 'CommentController@store');
    Route::get('/{courseId}', 'CommentController@show');
    Route::put('/{courseId}', 'CommentController@update');
    Route::delete('/{courseId}', 'CommentController@destroy');

});

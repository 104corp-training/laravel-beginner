<?php

use App\Exceptions\APIException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

Route::get('/courses', function () {
    $users = DB::table('Course')->get();
    return $users;
});

Route::get('/courses/{id}', function($id){
    $users = DB::table('Course')->where('id',$id)->get();
    return $users;
});

Route::prefix('exams')->group(function () {
    Route::get('/', 'ExamController@index');
    Route::post('/', 'ExamController@store');
    Route::get('/{examId}', 'ExamController@show');
    Route::put('/{examId}', 'ExamController@update');
    Route::delete('/{examId}', 'ExamController@destroy');
});

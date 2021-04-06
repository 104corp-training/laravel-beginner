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
use App\Http\Controllers\Controller;

Route::get('/', 'WelcomeController@index');

Route::get('/pages/{target}', 'OperationController@show');

Route::prefix('upload')->get('/{target}', 'Controller@submitRequest');

Route::prefix('courses')->group( function(){
    Route::post('/{target}', 'Controller@postRequestCource');
});

Route::prefix('comments')->group( function(){
    Route::post('/{target}', 'Controller@postRequestComment');
});
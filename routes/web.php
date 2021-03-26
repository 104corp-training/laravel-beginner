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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
//Route::get('/profile', function () {
//    return view('profile');
//});

use App\CourseStudent;
use App\Models\Course;
use App\Models\Student;

Route::get('/profile', 'ProfileController@index');

Route::get('/profile/cache', 'ProfileController@cache');

Route::get('/', 'WelcomeController@index');

Route::get('/operation/{op_code}', 'OperationController@show');

Route::get('/new_class', 'NewCourseController@index');

Route::post('/new_class/submit', 'NewCourseController@submit');

//Route::post('/new_class/submit', 'WelcomeController@index');

Route::get('/new', 'DatabaseController@test');

//Route::get('/test', 'DatabaseController@index');

Route::get('/read',function(){
    $body = Course::all();
    
    foreach ($body as $elem) {
        $elem = $elem->courses;
        foreach ($elem as $key => $value) {
            echo "<h4>", gettype($value), "</h4>";
            echo "<h3> $key => $value </h3>";
        }
    }
});
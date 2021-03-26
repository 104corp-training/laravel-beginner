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

Route::get('/{operation}/{sub_operation}', 'Controller@getRequest');

Route::post('/{operation}', 'Controller@postRequest');

//Route::post('/new_class/submit', 'NewCourseController@submit');

/*
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

Route::get('/profile', 'ProfileController@index');

Route::get('/profile/cache', 'ProfileController@cache');

*/